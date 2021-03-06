@extends('layouts.base')
@section('content')
<!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{url('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">

            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @if ($cart)
                     @foreach ($cart->items as $item)
                                                 
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('images/products/'.$item['image'])}}" alt=""></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="#">{{$item['name']}}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">{{$item['price']}}</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$item['qty']}}" data-max="120" pattern="[0-9]*" >									
                                <a class="btn btn-increase" href="#"></a>
                                <a class="btn btn-reduce" href="#"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total"><p class="price">{{$item['qty'] * $item['price'] }}</p></div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" title="">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                    @else
                    <li class="pr-cart-item">
                       
                        <div class="product-name">
                            <p style="font-size: 30px; text-align: center" >No Item In Cart</p>
                        </div>
                    </li>
                    @endif
                    </li>												 
                </ul>
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{($cart) ? $cart->totalPrice : '0'}}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{($cart) ? $cart->totalPrice : '0'}}</b></p> 
                    {{-- {{$cart->totalPrice}} --}}
                </div>
                <div class="checkout-info">
                    {{-- <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                    </label> --}}
                    @if(Auth::check())
                    <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                    @else
                    <a class="btn btn-checkout" href="{{route('login')}}">Login First For Check out</a>
                    @endif
                    <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="{{route('cart.clear')}}">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="#">Update Shopping Cart</a>
                </div>
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        @foreach ($products as $product)
                            
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="{{$product->name}}">
                                    <figure><img src="{{asset('images/products/'.$product->image)}}" width="214" height="214" alt="{{$product->name}}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$product->description}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$product->price}}</span></div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
<!--main area-->
    
@endsection