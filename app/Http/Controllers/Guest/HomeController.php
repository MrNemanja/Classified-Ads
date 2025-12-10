<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        $ads = Ad::latest()->paginate(9);

        return view('guest.home', compact('ads', 'categories'));
    }

 
    public function search(Request $request)
    {
        $query = Ad::query();

        if ($request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->description) {
            $query->where('description', 'like', '%' . $request->description . '%');
        }

        if ($request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->price_min) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->price_max) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->category_id) {
            $category = Category::find($request->category_id);

            if ($category) {

                $categoryIds = $category->allChildrenIds();
                $query->whereIn('category_id', $categoryIds);
            }
        }

        $ads = $query->latest()->paginate(9);

        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('guest.search', compact('ads', 'categories'));
    }
}