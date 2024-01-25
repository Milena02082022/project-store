<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Traits\OrderTrait;
use App\Http\Requests\StoreOrderRequest;


class MakingOrderController extends Controller
{
    use OrderTrait;

    public function basketPlace()
    {
        $order = $this->getOrder();

        if ($this->orderService->hasNonEmptyOrderItems($order)) {
            return view('basket-place', compact('order'));
        }
        
        return redirect()->route('basket')->with('error', 'Немає товарів для оформлення замовлення');
    }

    public function placeOrder(StoreOrderRequest $request, Order $order)
    {
        $order = $this->getOrder();

        $validated = $request->validated();
        
        $order->name = $validated['name'];
        $order->phone_number = $validated['phone_number'];
        $order->shipping_address = $validated['shipping_address'];
        $order->postal_service = $validated['postal_service'];
        $order->payment_method = $validated['payment_method'];
        $order->total_amount = $order->getTotalPrice();
        $order->status = 'completed';
        
        $order->save();
        
        return redirect()->route('user.home')->with('success', 'Замовлення успішно оформлено!');

    }
}

