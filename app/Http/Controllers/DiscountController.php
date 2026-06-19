<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discounts()
    {
        return response()->json(
            auth()->user()
                ->discounts()
                ->with('family:id,name,code')
                ->get()
        );
    }
}
