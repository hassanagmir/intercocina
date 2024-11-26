<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
// use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\LaravelPdf\Facades\Pdf;

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


    public function invoice(Order $order){
        // $order->load('order', 'invoiceItems.product');

        // return view('invoice', compact('order'));

        return Pdf::view('invoice', ['order' => $order])
        ->format('A4')
        
        // Margins for professional print layout
        // ->margins(15, 15, 15, 15)
        ->name("{$order->code}.pdf");
    
        // $pdf = PDF::loadView('invoice', [
        //     'order' => $order
        // ]);
    
        // return $pdf->download("{$order->code}.pdf");
    }
}
