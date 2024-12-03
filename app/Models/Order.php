<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentEnum;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


#[ObservedBy([OrderObserver::class])]
class Order extends Model
{
    use HasFactory, LogsActivity, Notifiable;

    protected $fillable = [
        'user_id', 'code', 'total_amount', 'status', 'address_id', 'payment'
    ];

    protected $casts = [
        'status' =>  OrderStatusEnum::class,
        'payment' =>  PaymentEnum::class,
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['user_id', 'code', 'total_amoount']);
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

    public function exportToTextFile()
    {
        $order = Order::with('items')->findOrFail($this->id);
        $content = "";
        foreach ($order->items as $item) {
            $content .= "1      0       24BDE01389      " 
                      . ($item->created_at ? $item->created_at->format('ymd') : '000000') . "        "
                      . ($order->user->full_name) . "      " 
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
