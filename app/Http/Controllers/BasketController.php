<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class BasketController extends Controller
{
    public function basket(){
        return view('basket');
    }

    public function basketPlace(){
        return view('basket-place');
    }

    public function basketAdd($productId){
        dd($productId);
    }


}

