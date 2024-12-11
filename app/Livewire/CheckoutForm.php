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

    #[Validate('required', message: 'Ajoutez ou sélectionnez votre adresse')]
    public $address;


    #[Validate('required', message: "Sélectionnez un mode de paiement")]
    public $payment;


    public function mount()
    {
        // \Cart::clear();
        // dd(\Cart::getContent());
    }


    public function save()
    {
        
        if(auth()->user()->status->value == 2){
            session()->flash('error_message', __("Désolé, votre compte est actuellement inactif. Veuillez contacter le support au +212 661-547900 pour plus d'informations."));
            return;
        }


        $this->validate();
        if (\Cart::getContent()->count() == 0) {
            return $this->dispatch("reloadPage");
        }

        if (Address::find($this->address)?->user_id != auth()->id()) {
            session()->flash('error_message', __("Cette adresse n'est pas pour vous"));
            abort(404);
        }


        $order = Order::create([
            'user_id' => auth()->id(),
            'code' => "INTER-" . Str::random(15),
            'total_amount' => \Cart::getTotal(),
            'status' => OrderStatusEnum::ON_HOLD,
            'address_id' => $this->address,
            'payment' => $this->payment
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
