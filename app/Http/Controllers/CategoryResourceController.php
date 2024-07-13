<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories', [
            'categories' => Category::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => ['required'],
            'image' => ['required'],
        ]);

        Category::create([
            'category_name' => $validated['category_name'],
            'image' => 'storage/' . $request->file('image')->store('images')
        ]);

        return redirect()->back()->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.edit_category', [
            'category' => Category::query()->firstWhere('id', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_name' => ['required'],
            'image' => ['nullable'],
        ]);

        $category = Category::query()->where('id', $id)->first();

        if ($request->file('image')) {
            $validated['image'] = 'storage/' . $request->file('image')->store('images');
        } else {
            $validated['image'] = $category->image;
        }

        $category->update($validated);
        return redirect('categories')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::query()->firstWhere('id', $id);
        $category->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus');
    }
}
