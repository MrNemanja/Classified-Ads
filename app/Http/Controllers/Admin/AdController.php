<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->paginate(10);
        return view('admin.allads', compact('ads'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.createad', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'condition' => 'required|in:new,used',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:5120',
            'contact_phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('ads', 'public');
        }

        $data['user_id'] = auth()->id();

        Ad::create($data);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Ad successfully created.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $ad = Ad::findOrFail($id);
        return view('admin.editad', compact('ad', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'condition' => 'required|in:new,used',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:5120',
            'contact_phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('ads', 'public');
        }

        $ad->update($data);

        return redirect()->route('admin.ads.index')
                         ->with('success', 'Ad successfully updated');
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        return redirect()->route('admin.ads.index')
                         ->with('success', 'Ad successfully deleted.');
    }
}
