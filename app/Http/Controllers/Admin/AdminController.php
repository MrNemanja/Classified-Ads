<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ad;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $adsCount = Ad::count();
        $categoriesCount = Category::count();

        return view('admin.dashboard', compact('usersCount', 'adsCount', 'categoriesCount'));
    }
}
