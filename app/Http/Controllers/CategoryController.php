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
        return 'Запит на створення нової категорії';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            return view('admin.classes.show', compact('category'));
        } else {
            return redirect()->route('classes.index')->with('error', 'Категорія не знайдена або її не існує');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Category $category)
    {
        $oldCategory = Category::find($id);
        $newCategoryName = '';
        return view('admin.classes.edit', compact('oldCategory', 'newCategoryName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newCategoryName = $request->input('new_category_name');
        $oldCategory = Category::find($id);

        if ($oldCategory) {
            $oldCategory->name = $newCategoryName;
            $oldCategory->save();
        }

        return redirect()->route('classes.index')->with('success', 'Категорію успішно змінено.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('classes.index')->with('success', 'Категорію успішно видалено.');
        }else {
            return redirect()->route('classes.index')->with('error', 'Помилка видалення категорії.');
        } 
    }
}
