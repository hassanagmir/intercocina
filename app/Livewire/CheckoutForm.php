<?php

namespace App\Livewire;

use App\Enums\OrderStatusEnum;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class CheckoutForm extends Component
{
    #[Validate('required', message: 'Ajoutez ou sélectionnez votre adresse')]
    public $address;

    #[Validate('required', message: "Sélectionnez un mode de paiement")]
    public $payment;

    #[Validate('required', message: "Sélectionnez le transport d'expédition")]
    public $shipping;

    public $shippings;
    public $addresses;

    public function mount()
    {
        // Initialize collections
        $this->shippings = Shipping::all();
        $this->addresses = Address::where("user_id", auth()->id())->get();
        
        // Set default shipping from user if exists
        if (auth()->user()->shipping_id) {
            $this->shipping = auth()->user()->shipping_id;
        } else {
            // Set default shipping to first available option if user doesn't have one
            $this->shipping = $this->shippings->first()?->id;
        }
    }

    public function updatedShipping($value)
    {
        // Validate shipping exists when changed
        if (!$this->shippings->contains('id', $value)) {
            $this->shipping = $this->shippings->first()?->id;
        }
    }

    public function save()
    {
        $this->validate();
        
        if(auth()->user()->status->value == 2){
            session()->flash('error_message', __("Désolé, votre compte est actuellement inactif. Veuillez contacter le support au +212 661-547900 pour plus d'informations."));
            return;
        }

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
            'total_amount' => \Cart::getTotal() * 1.2,
            'status' => OrderStatusEnum::ON_HOLD,
            'address_id' => $this->address,
            'payment' => $this->payment,
            'shipping_id' => $this->shipping,
        ]);

        foreach (\Cart::getContent() as $product) {
            $item = OrderItem::create([
                'order_id' => $order->id,
                'code' => "INTER-" . strtoupper(Str::random(15)),
                'total' => $product['price'] * intval($product['quantity']),
                'quantity' => $product['quantity'],
                'color_id' => $product['attributes']['color'],
                'product_id' => $product['attributes']['product_id'],
                'dimension_id' => $product['attributes']['dimension_id'],
            ]);

            if($product['attributes']['special']){
                $item->update([
                    'special_height' => str_replace(" ","", explode("*", $product['attributes']['dimension'])[0]),
                    'special_width' => str_replace(" ","", explode("*", $product['attributes']['dimension'])[1]),
                ]);
            }
        }
        
        session()->flash('message', __('Votre commande a été envoyée avec succès!'));
        \Cart::clear();
        return redirect()->route("order.list");
    }

    public function render()
    {
        return view('livewire.checkout-form');
    }
}