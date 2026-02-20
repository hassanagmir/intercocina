<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discounts()
    {
        return Discount::with('family')->where('user_id', auth()->id())->get();
    }
}
