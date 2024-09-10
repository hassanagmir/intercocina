<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(){
        $orders = Order::where("user_id", auth()->id())->paginate(30);
        return view('order.list', compact('orders'));
    }


    public function show(Order $order){
        return view('order.show', compact('order'));
    }
}
