<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.goods.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required', 
            'code' => 'required', 
            'description' => 'required',
            'price' => 'required', 
        ]);
        Product::create([
            'category_id' => $request->input('category_id'),
            'name'        => $request->input('name'),
            'code'        => $request->input('code'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
        ]);
        return redirect()->route('goods.index')->with('success', 'Товар успішно створено.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.goods.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.goods.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'new_product_name' => 'required',
        ]);

        $product->update([
            'name' => $request->input('new_product_name'),
        ]);

        return redirect()->route('goods.index')->with('success', 'Товар успішно змінено.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product) {
            $product->delete();
            return redirect()->route('goods.index')->with('success', 'Товар успішно видалений.');
        }else {
            return redirect()->route('goods.index')->with('error', 'Помилка видалення товару.');
        } 
    }
}
