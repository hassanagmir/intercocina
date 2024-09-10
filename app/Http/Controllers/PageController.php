<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function home(){
        $products = Product::all();
        $title = __("Intercocina maroc");
        return view('home', compact('products', 'title'));
    }


    public function about(){
        $brands = Brand::all();
        $title = __("À propos");
        return view('about', compact('brands', 'title'));
    }


    public function settings(){
        $title = __("Paramètres");
        return view('settings', compact('title'));
    }

    public function cart(){
        $title = __("Panier");
        return view('cart', compact('title'));
    }

    public function checkout(){
        $title = __("Vérification de commande");
        return view('checkout', compact('title'));
    }

    public function thanks(){
        $title = __("Merci pour votre commande");
        return view('thanks', compact('title'));
    }

    public function profile(){
        $orders = Order::where('user_id', auth()->id())->paginate(6);
        $title = auth()->user()->first_name . " " . auth()->user()->last_name;
        return view('profile', compact('title', 'orders'));
    }

    
}
