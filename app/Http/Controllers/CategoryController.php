<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.classes.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'code'        => 'required',
            'description' => 'required', 
        ]);
        Category::create([
            'name'        => $request->input('name'),
            'code'        => $request->input('code'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('classes.index')->with('success', 'Категорію успішно створено.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.classes.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Category $category)
    {
        return view('admin.classes.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'new_category_name' => 'required',
        ]);

        $category->update([
            'name' => $request->input('new_category_name'),
        ]);


        return redirect()->route('classes.index')->with('success', 'Категорію успішно змінено.');
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
            return redirect()->route('classes.index')->with('success', 'Категорію успішно видалено.');
        } else {
            return redirect()->route('classes.index')->with('error', 'Помилка видалення категорії.');
        }
    }
}
