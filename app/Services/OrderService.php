<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class OrderService
{
	protected function getOrder($user)
   {
      $order = $user->order; 

      if (is_null($order)) {
         $order = Order::create(['user_id' => $user->id, 'status' => 'processing']);
         session(['orderId' => $order->id]);
      }

      return $order;
   }

   public function addToBasket($user, Product $product)
   {
      $order = $this->getOrder($user);

      if ($order->orderItems->contains('product_id', $product->id)) {
         $this->increaseItemQuantity($order, $product);
      } else {
         $this->addNewOrderItem($order, $product);
      }
   }

	public function increaseItemQuantity(OrderItem $orderItem)
   {
      $orderItem->increment('count');

      $orderItem->update();
   }

   public function decreaseItemQuantity(OrderItem $orderItem)
   {
      if ($orderItem->count > 1) {
         $orderItem->decrement('count');
         $orderItem->update();
      } else {
         $orderItem->delete();
      }
   }

   public function removeItem(OrderItem $orderItem)
   {
      $orderItem->delete();
   }

   public function getOrderForUser($user)
   {
      return Order::where('user_id', $user->id)
         ->where('status', 'processing')
         ->latest()
         ->first();
   }

   protected function addNewOrderItem(Order $order, Product $product)
   {
      $order->orderItems()->create([
         'product_id' => $product->id,
         'count' => 1,
         'price' => $product->price,
      ]);
   }

   public function hasNonEmptyOrderItems($order) 
   {
      return $order && $order->orderItems->isNotEmpty();
   }
}
