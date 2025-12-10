<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $categoryIds = $category->allChildrenIds();

        $ads = Ad::whereIn('category_id', $categoryIds)->latest()->paginate(9);

        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('guest.category', compact('category', 'ads', 'categories'));
    }
}
