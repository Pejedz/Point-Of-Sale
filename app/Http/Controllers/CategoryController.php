<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//: RedirectResponse
    {
        $request->validate([
            'name'  => 'required|min:2|max:10',
        ],[
            'name.required'  => 'harap diisi',
            'name.min'  => 'minimal 2 huruf bossku',
            'name.max'  => 'maximal 10 huruf bossku',
        ]);

        Category::create([
          'name' => $request->name
        ]);

        
        return redirect()->route('category.index')->with('add', 'Category Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:2|max:10'.$category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('CategoryEdit', 'Category berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)//: RedirectResponse
    {
        // $category = Category::find($category);
        $category->delete();
        return redirect()->back()->with('success', 'Category Terhapus');
        // return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
