<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\OrderItem;
use App\Traits\OrderTrait;

class BasketController extends Controller
{
    use OrderTrait;

    public function basket()
    {
        $order = $this->getOrder();

        return view('basket', compact('order'));
    }

    public function basketAdd(Product $product)
    {
        $user = Auth::user(); 

        if (!$product) {
            return redirect()->route('basket')->with('error', 'Товар не знайдено');
        }

        $this->orderService->addToBasket($user, $product);

        return redirect()->route('basket')->with('success', 'Товар додано до корзини');
    }

    public function basketIncrease(OrderItem $orderItem)
    {
        $this->orderService->increaseItemQuantity($orderItem);

        return redirect()->route('basket')->with('success', 'Кількість товару збільшено');
    }

    public function basketDecrease(OrderItem $orderItem)
    {
        $this->orderService->decreaseItemQuantity($orderItem);

        return redirect()->route('basket')->with('success', 'Кількість товару зменшено');
    }

    public function basketRemove(OrderItem $orderItem)
    {
        $this->orderService->removeItem($orderItem);

        return redirect()->route('basket')->with('success', 'Товар видалено з корзини');
    }
}
