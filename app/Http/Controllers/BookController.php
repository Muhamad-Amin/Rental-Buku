<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('book', [
            'books' => $books
        ]);
    }

    public function add() {
        $categories = Category::all();
        return view('book-add', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        $newName = '' ;

        if($request->file('image')) {
            $ekstension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$ekstension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;

        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book Added Successfully');
    }

    public function edit($slug) {
        $categories = Category::all();
        $book = Book::where('slug', $slug)->first();
        return view('book-edit', [
            'book' => $book,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $slug)
    {

        if($request->file('image')) {
            $ekstension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$ekstension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());

        if($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('books')->with('status', 'Book Updated Successfully');
    }

    public function delete($slug) {
        $book = Book::where('slug', $slug)->first();
        return view('book-delete', [
            'book' => $book
        ]);
    }

    public function destroy($slug) {
        $deletedBook = Book::where('slug', $slug)->first();
        $deletedBook->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully');
    }

    public function deletedBook() {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('book-delete-list', [
            'deletedBooks' => $deletedBooks
        ]);
    }

    public function restore($slug) {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restore Successfully');
    }
}
