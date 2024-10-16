<?php

namespace App\Livewire;

use App\Enums\OrderStatusEnum;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;


class CheckoutForm extends Component
{

    #[Validate('required')]
    public $address;


    public function mount()
    {
        // \Cart::clear();
        // dd(\Cart::getContent());
    }


    public function save()
    {

        $this->validate();
        if (\Cart::getContent()->count() == 0) {
            return $this->dispatch("reloadPage");
        }

        if (Address::find($this->address)?->user_id != auth()->id()) {
            session()->flash('message', __("Cette adresse n'est pas pour vous"));
            abort(404);
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'code' => "INTER-" . Str::random(15),
            'total_amount' => \Cart::getTotal(),
            'status' => OrderStatusEnum::ON_HOLD,
            'address_id' => $this->address
        ]);

        foreach (\Cart::getContent() as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'code' => "INTER-" . strtoupper(Str::random(15)),
                'total' => $product['price'] * intval($product['quantity']),
                'quantity' => $product['quantity'],
                'color_id' => $product['attributes']['color'],
                'product_id' => $product['attributes']['product_id'],
                'dimension_id' => $product['attributes']['dimension_id']
            ]);
        }

        session()->flash('message', __('Votre commande a été envoyée avec succès!'));
        \Cart::clear();
        return redirect()->route("order.list");
    }




    public function render()
    {
        $addresses = Address::where("user_id", auth()->id())->get();
        return view('livewire.checkout-form', compact('addresses'));
    }
}
