<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $order = $user->orders()->where('status', 'В обробці')->first();

        if (!$order) {
            return redirect()->route('basket')->with('error', 'Немає товарів в корзині для оформлення замовлення');
        }

        return view('checkout.index', compact('order'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:10',
            'shipping_address' => 'required|string|max:255',
            'postal_service' => 'required|in:nova_poshta,ukrposhta', 
            'payment_method' => 'required|in:card,cash',
        ]);

        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);

            if ($order && $order->orderItems->isNotEmpty()) {
    
                $order->update([
                    'name' => $request->input('name'),
                    'phone_number' => $request->input('phone_number'),
                    'shipping_address' => $request->input('shipping_address'),
                    'postal_service' => $request->input('postal_service'),
                    'payment_method' => $request->input('payment_method'),
                    'total_amount' => $order->getTotalPrice(),
                ]);
                $order->status = 'Замовлено';
                $order->save();
                return redirect()->route('home')->with('success', 'Замовлення успішно оформлено!');
            }
        }

        return redirect()->route('basket')->with('error', 'Немає товарів для оформлення замовлення');
    }

    
}
