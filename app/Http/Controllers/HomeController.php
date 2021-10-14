<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastProducts = Product::latest()->take(7)->get();
        $saleProducts = Product::where('has_offer',1)->get();
        $sliders = Slider::all();
        return view('frontend.home',compact('sliders','lastProducts','saleProducts'));
    }
    public function aboutUs()
    {
        return view('frontend.aboutus');
    }
    public function shop()
    {
        $categories = Category::where('parent_id',null)->get();
        
        $products = Product::all();
      
        return view('frontend.shop',compact('categories','products'));
    }
    public function cart()
    {
        $products = Product::all();
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

      return view('frontend.cart', compact('cart','products'));
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function contactUs()
    {
        return view('frontend.contactus');
    }
}
