<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;    

    public function addToCart(Product $product) {
      if (session()->has('cart')) {
          $cart = new Cart(session()->get('cart'));
      } else {
          $cart = new Cart();
      }
      $cart->add($product);
      //dd($cart);
      session()->put('cart', $cart);
      toastr()->success('Product Add To Cart Successfully');
      return redirect()->route('shop');

    }
    public function showCart() {

      if (session()->has('cart')) {
          $cart = new Cart(session()->get('cart'));
      } else {
          $cart = null;
      }
      return view('cart.show', compact('cart'));
    }
    public function clearCart() {

        if (session()->has('cart')) {
            session()->flush();
        }
        return redirect()->route('cart');
      }

    
}
