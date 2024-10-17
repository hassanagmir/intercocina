<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }

        $orders = Order::where("user_id", auth()->id())->latest()->paginate(30);
        $title = 'Commandes';
        return view('order.list', compact('orders', 'title'));
    }


    public function show(Order $order){
        if(!($order->user_id == auth()->id())){
            return abort(404);
        }
        $title = $order->code;
        return view('order.show', compact('order', 'title'));
    }
}
