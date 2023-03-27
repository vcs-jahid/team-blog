<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categories, $category;
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        Category::createCategory($request);
        return back()->with('message', 'Successfully category added');
    }

    public function manage()
    {
        $this->categories = Category::all();
        return view('admin.category.manage', ['categories' =>  $this->categories]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit', ['category' => $this->category]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('teacher/category/manage')->with('message', 'Successfully Updated!');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('teacher/category/manage')->with('message', 'Successfully Deleted!');
    }
}
