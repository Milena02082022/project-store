<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        
        Product::create([
            'category_id' => $validated['category_id'],
            'name'        =>  $validated['name'],
            'code'        =>  $validated['code'],
            'description' =>  $validated['description'],
            'price'       =>  $validated['price'],
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->name = $validated['new_product_name'];
        $product->save();

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
