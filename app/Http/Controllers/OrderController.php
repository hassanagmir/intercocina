<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
// use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\LaravelPdf\Facades\Pdf;




class OrderController extends Controller
{
    public function list()
    {
        if (!auth()->user()) {
            return redirect()->route('user.login');
        }

        $orders = Order::where("user_id", auth()->id())->latest()->paginate(30);
        $title = 'Commandes';
        return view('order.list', compact('orders', 'title'));
    }


    public function show(Order $order)
    {
        if (!($order->user_id == auth()->id())) {
            return abort(404);
        }
        $title = $order->code;
        return view('order.show', compact('order', 'title'));
    }



    public function api_list(Request $request)
    {
        $apiKey = $request->header('INTER-API-KEY');
        if ($apiKey !== env('API_KEY')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return \App\Http\Resources\OrderResource::collection(Order::where('status', 2)->get());
    }


    public function confirm(Request $request)
    {
        $apiKey = $request->header('INTER-API-KEY');
        if ($apiKey !== env('API_KEY')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        $order = Order::where('code', $request->code)->first();
    
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
    
        $order->status = 3;
        $order->save();
    
        return new \App\Http\Resources\OrderResource($order);
    }
    
    

    public function invoice(Order $order)
    {
        return Pdf::view('invoice', ['order' => $order])
            ->format('A4')
            ->name("{$order->code}.pdf");
    }


    public function exportOrder(Order $order)
    {
        $filename = $order->exportToTextFile();

        return response()->download(
            storage_path('app/exports/' . $filename),
            $filename,
            ['Content-Type' => 'text/plain']
        );
    }

    public function exportOrderText(Order $order){
        $filename = $order->exportText();

        return response()->download(
            storage_path('app/exports/' . $filename),
            $filename,
            ['Content-Type' => 'text/plain']
        );
    }
}
