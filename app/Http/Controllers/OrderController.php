<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $orders = Order::all();
      return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
      return view('admin.orders.show', compact('order'));
    }
    
}
