<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);
        }
        return view('basket', compact('order'));
    }

    public function basketAdd($productId)
    {
        $user = Auth::user(); 

        if (!$user) {
            return redirect()->route('login')->with('error', 'Для додавання товарів до корзини потрібно увійти в систему.');
        }

        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('basket')->with('error', 'Товар не знайдено');
        }

        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create(['user_id' => $user->id, 'status' => 'В обробці']);
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->orderItems->contains('product_id', $productId)) {
            $pivotRow = $order->orderItems->where('product_id', $productId)->first();
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $orderItem = new OrderItem([
                'product_id' => $productId,
                'count' => 1,
                'price' => $product->price,
            ]);

            $order->orderItems()->save($orderItem);
        }
        return redirect()->route('basket')->with('success', 'Товар додано до корзини');
    }

    public function basketIncrease($itemId)
    {
        $orderItem = OrderItem::find($itemId);

        if (!$orderItem) {
            return redirect()->route('basket')->with('error', 'Товар не знайдено');
        }
        $orderItem->count++;
        $orderItem->update();

        return redirect()->route('basket')->with('success', 'Кількість товару збільшено');
    }

    public function basketDecrease($itemId)
    {
        $orderItem = OrderItem::find($itemId);

        if (!$orderItem) {
            return redirect()->route('basket')->with('error', 'Товар не знайдено');
        }
    
        if ($orderItem->count > 1) {
            $orderItem->count--;
            $orderItem->update();
        } else {
            $orderItem->delete();
        }
    
        return $this->redirectWithSuccess('Кількість товару зменшено');
    }

    public function basketRemove($itemId)
    {
        $orderItem = OrderItem::find($itemId);

        if (!$orderItem) {
            return redirect()->route('basket')->with('error', 'Товар не знайдено');
        }
    
        $orderItem->delete();
    
        return $this->redirectWithSuccess('Товар видалено з корзини');

    }

    protected function redirectWithSuccess($message)
    {
        return redirect()->route('basket')->with('success', $message);
    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);

            if ($order && $order->orderItems->isNotEmpty()) {
                return view('basket-place', compact('order'));
            }
        }
        return redirect()->route('basket')->with('error', 'Немає товарів для оформлення замовлення');
    }
   
}










    


