<?php

namespace App\Traits;

use App\Models\Order;  

trait OrderTrait
{
	private function getOrder()
   {
      $orderId = session('orderId');

      return $orderId ? Order::find($orderId) : null;
   }
}
