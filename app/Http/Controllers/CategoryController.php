<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category', [
            'categories' => $categories
        ]);
    }

    public function add() {
        return view('category-add');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'unique:categories|required|max:100'
        ]);
        $category = Category::create($request->all());

        // if($category) {
        //     Session::flash('status', 'success');
        //     Session::flash('message', 'Category added successfully');
        // }
        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    public function edit($slug) {
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $slug) {
        $validated = $request->validate([
            'name' => 'unique:categories|required|max:100'
        ]);


        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category updated successfully');
    }

    public function delete($slug) {
        $deletedCategory = Category::where('slug', $slug)->first();
        return view('category-delete', [
            'category' => $deletedCategory
        ]);
        // $deletedCategory->delete();
        // return redirect('categories')->with('status', 'Category deleted successfully');
    }

    public function destroy($slug) {
        $deletedCategory = Category::where('slug', $slug)->first();
        $deletedCategory->delete();
        return redirect('categories')->with('status', 'Category deleted successfully');
    }

    public function deletedCategory() {
        $deletedCategory = Category::onlyTrashed()->get();
        return view('category-deleted-list', [
            'deletedCategory' => $deletedCategory
        ]);
    }

    public function restore($slug) {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category restore succsessfully');
    }


}
