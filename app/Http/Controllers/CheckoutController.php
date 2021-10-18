<?php

namespace App\Http\Controllers;

use App\Events\OrderEvent;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   
    public function store(OrderRequest $request){
     $cart = session()->get('cart');
       $order =  Order::create([
            'user_id' =>Auth::id(),
            'total' => $cart->totalPrice,
            'shipping_first_name' =>$request->shipping_first_name,
            'shipping_last_name' =>$request->shipping_last_name,
            'shipping_email' =>$request->shipping_email,
            'shipping_phone' =>$request->shipping_phone,
            'shipping_address' =>$request->shipping_address,
            'shipping_city' =>$request->shipping_city,
        ]);
        event(new OrderEvent($order));
        toastr()->success('Order Make Successfully');
        return redirect()->route('checkout');
    }
}
