<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(6)->get();
        $categories = Category::get();

        return view('welcome', compact('products','categories'));
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function products()
    {
        $products = Product::get();

        return view('products', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();

        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();

        return view('category', compact('category'));
    }
    
    public function product($category, $productCode)
    {
        $product = Product::where('code', $productCode)->first();
        
        return view('product', ['category' => $category, 'product' => $product]);
    }
}
