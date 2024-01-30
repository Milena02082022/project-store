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
        
        $order->fill(array_merge($validated, ['total_amount' => $order->getTotalPrice(), 'status' => 'completed']))->save();
                
        return redirect()->route('user.home')->with('success', 'Замовлення успішно оформлено!');

    }
}

