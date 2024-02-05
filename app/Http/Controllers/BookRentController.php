<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index() {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        $books = Book::where('status', 'in stock')->get();
        return view('book-rent', [
            'users' => $users,
            'books' => $books
        ]);
    }

    public function store(Request $request) {
        $request['rent_date'] = Carbon::now()->toDateTimeString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'in stock') {
            Session::flash('message', 'Cannot rent, the book is not avileble');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {

            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if($count >= 3 ) {
                Session::flash('message', 'Cannot rent, user has reach limit of books');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();

                    // proces insert to rent_rogs table
                    RentLogs::create($request->all());

                    // proces update books table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();

                    Session::flash('message', 'Rent Book Success');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');

                } catch (\Throwable $th) {
                    DB::rollBack();
                    Session::flash('message', 'Rent Log Failed');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect('book-rent');
                }
            }
        }

    }

    // konfirmasi pengembailan buku
    public function returnBook() {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        $books = Book::all();
        return view('return-book', [
            'users' => $users,
            'books' => $books
        ]);
    }

    // pengembalian buku
    public function saveReturnBook(Request $request) {
        // user & buku yang dipilih untuk direturn benar, maka berhasil return book
        // user & book yang dipilih untuk di return salah, maka akan muncul return nothis

        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();


        if($countData == 1) {
            // kita akan return book
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();
            $book = Book::where('id', $rentData->book_id)->update([
                'status' => 'in stock'
            ]);
            Session::flash('message', 'The books is returned successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('rent-return');
        } else {
            // error notice muncul
            Session::flash('message', 'There is error in process');
            Session::flash('alert-class', 'alert-danger');
            return redirect('rent-return');
        }
    }

}
