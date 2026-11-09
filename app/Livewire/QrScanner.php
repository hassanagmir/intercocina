<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class QrScanner extends Component
{

    public $scannedCode = '';
    public $error = '';
    
    public function scanComplete()
    {
        try {
            // Clean the scanned code (remove any non-numeric characters if it's purely an ID)
            $productId = trim($this->scannedCode);
            
            // Find the product
            $product = Product::find($productId);
            
            if ($product) {
                // Redirect to the product page
                return redirect()->route('products.show', $product);
            } else {
                $this->error = 'Product not found.';
            }
        } catch (\Exception $e) {
            $this->error = 'Invalid QR code format.';
        }
    }


    public function render()
    {
        return view('livewire.qr-scanner');
    }
}
