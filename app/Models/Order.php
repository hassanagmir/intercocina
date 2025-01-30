<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentEnum;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


#[ObservedBy([OrderObserver::class])]
class Order extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'code',
        'total_amount',
        'status',
        'address_id',
        'payment',
        'special_height',
        'special_width',
        'shipping_id',
    ];

    protected $casts = [
        'status' =>  OrderStatusEnum::class,
        'payment' =>  PaymentEnum::class,
    ];

    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }


    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function exportText()
    {


        $order = Order::with('items')->findOrFail($this->id);
        $content = "";
        foreach ($order->items as $item) {
            $content .= ""
                . ($item->dimension ? $item->dimension->code . " " : $item->product->code . " ")
                . ($item->product->name) . " "
                . ($item->dimension?->attribute ? $item->dimension?->attribute->name . " " : '')
                . ($item->dimension ? $item->dimension->dimension . "" : '')
                . ($item->color ? $item->color->name . " " : '')
                . ($item->dimension ? $item->dimension->price : ($item->special_width ? $item->total : ($item->product->price ?? '0')) ) . " "
                . "QTY: " . ($item->quantity ?? '1')
                . "\n";
        }
        $filename = "order_{$order->code}_" . now()->format('ymd') . ".txt";
        $filepath = storage_path('app/exports/' . $filename);
        Storage::makeDirectory('exports');
        File::put($filepath, $content);
        return $filename;
    }

    // Export order .txt
    public function exportToTextFile()
    {
        $order = Order::with('items')->findOrFail($this->id);
        $content = "";
        foreach ($order->items as $item) {
            $content .= "0      0       24BDE01389  "
                . ($item->created_at ? $item->created_at->format('ymd') : '000000') . "        "
                . ($order->user->code) . "      "
                . ($item->dimension ? $item->dimension->code : ($item->product->code ?? 'No Code')) . "       "

                . ($item->product->name) . "        "
                . ($item->quantity ?? '0')
                . "\n";
        }
        $filename = "order_{$order->code}_" . now()->format('ymd') . ".txt";
        $filepath = storage_path('app/exports/' . $filename);
        Storage::makeDirectory('exports');
        File::put($filepath, $content);
        return $filename;
    }
}
