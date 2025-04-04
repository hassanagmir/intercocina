<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Exception;


class CartModal extends Component
{
    public array $cartItems = [];

    public function mount(): void
    {
        // \Cart::clear();
        $this->updateCartItems();
    }


    public function updateQuantity($productId, int $quantity): void
    {
        if ($quantity <= 0) {
            $this->delete($productId);
            return;
        }

        try {
            \Cart::update($productId, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity
                ]
            ]);
        } catch (Exception $e) {
            $this->dispatch('error', ['message' => 'Failed to update cart']);
        }
    }



    
    private function updateCartItems(): void
    {
        $currentItems = \Cart::getContent()->toArray();
        $this->cartItems = $currentItems;
    }

    #[On('add-to-cart')]
    public function updateCart(): void
    {
        $currentItems = \Cart::getContent()->toArray();
        $this->cartItems = $currentItems;
    }


    public function clearCart(): void
    {
        \Cart::clear();
        $this->updateCartItems();
    }


    public function delete($product_id) : void
    {
        \Cart::remove($product_id);
        $currentItems = \Cart::getContent()->toArray();
        $this->cartItems = $currentItems;
        $this->dispatch('remove-from-cart');
    }


    public function render()
    {
        return view('livewire.cart-modal');
    }
}