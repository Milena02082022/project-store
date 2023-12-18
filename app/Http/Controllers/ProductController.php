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
        return 'Запит на створення нового товару';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('admin.goods.show', compact('product'));
        } else {
            return redirect()->route('goods.index')->with('error', 'Товар не знайдено або його не існує');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Product $product)
    {
        $oldProduct = Product::find($id);
        $newProductName = '';
        return view('admin.goods.edit', compact('oldProduct', 'newProductName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newProductName = $request->input('new_product_name');
        $oldProduct = Product::find($id);

        if ($oldProduct) {
            $oldProduct->name = $newProductName;
            $oldProduct->save();
        }

        return redirect()->route('goods.index')->with('success', 'Товар успішно змінено.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('goods.index')->with('success', 'Товар успішно видалений.');
        }else {
            return redirect()->route('goods.index')->with('error', 'Помилка видалення товару.');
        } 
    }
}
