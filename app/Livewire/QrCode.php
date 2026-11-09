<?php

namespace App\Livewire;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode as SimpleQrCode;
use App\Models\Product;

class QrCode extends Component
{

    public Product $product;
    public $qrCode;
    public $size = 100;
    public $format = 'svg';
    
    public function mount()
    {

        $this->generateQrCode();
    }
    
    public function generateQrCode()
    {
        $this->qrCode = SimpleQrCode::size($this->size)
            ->format($this->format)
            ->generate(route('product.show', $this->product->slug))->toHtml();

    }
    
    public function updatedSize()
    {
        $this->generateQrCode();
    }

    
    public function render()
    {
        return view('livewire.qr-code');
    }
}
