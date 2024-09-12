<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Event;
use App\Models\Faq;
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
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
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
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        $orders = Order::where('user_id', auth()->id())->paginate(6);
        $title = auth()->user()->first_name . " " . auth()->user()->last_name;
        return view('profile', compact('title', 'orders'));
    }

    public function faqs(){
        $title = __("FAQs");
        $faqs = Faq::all();
        return view('pages.faqs', compact('faqs'));
    }

    public function contact(){
        $title = __("Contactez-nous");
        return view("pages.contact", compact('title'));
    }

    
}
