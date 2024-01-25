<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        Category::create([
            'name'        => $validated['name'],
            'code'        => $validated['code'],
            'description' => $validated['description'],
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
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->name = $validated['new_category_name'];
        $category->save();

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
