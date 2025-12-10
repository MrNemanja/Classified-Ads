<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.allcategories', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.createcategory', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($data);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Category successfully created.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id','!=',$id)->get();
        return view('admin.editcategory', compact('category','categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update($data);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category successfully updated.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category successfully deleted.');
    }
}
