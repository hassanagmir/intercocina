<?php

namespace App\Http\Controllers;

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


    public function invoice(Order $order)
    {

        // return view('invoice', compact('order'));


        return Pdf::view('invoice', ['order' => $order])
            ->format('A4')

            ->name("{$order->code}.pdf");

        // $pdf = PDF::loadView('invoice', [
        //     'order' => $order
        // ]);

        // return $pdf->download("{$order->code}.pdf");
    }




    public function exportOrder(Order $order)
    {
        $filename = $order->exportToTextFile();

        return response()->download(
            storage_path('app/exports/' . $filename),
            $filename,
            ['Content-Type' => 'text/plain']
        );


        try {
        } catch (\Exception $e) {
            dd("Not working");
            return back()->with('error', 'Failed to export order: ' . $e->getMessage());
        }
    }
}
