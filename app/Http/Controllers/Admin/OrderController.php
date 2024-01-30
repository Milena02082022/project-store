<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $orders = Order::query()->get();
      return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
      return view('admin.orders.show', compact('order'));
    }
    
}
