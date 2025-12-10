<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;

class AdController extends Controller
{
    public function show(Ad $ad)
    {
        $categories = Category::with('children.children')->whereNull('parent_id')->get();

        return view('guest.ad', compact('ad', 'categories'));
    }
}
