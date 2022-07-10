@extends('front.tema')
@section('title') Laravel - E-commerce
@endsection
@section('content')
@include('front.include.category')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($carts as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="img/cart/cart-1.jpg" alt="">
                                    <h5>{{$cart->getProducts->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$cart->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                      <form method="post" action="{{route('quantity.update',$cart->id)}}">
                                        @csrf
                                        <div class="pro-qty">
                                            <input type="text" name="qty" value="{{$cart->qty}}" min="1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    ${{$cart->price * $cart->qty}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{route('cart.delete',$cart->id)}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('template')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
                <br><br>
                <div class="shoping__cart__btns">
                    <a href="{{route('cart.delete.all')}}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Clear Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
              @if(Session::has('cupon_name'))
              @else
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form method="post" action="{{route('cupon.post')}}">
                          @csrf
                            <input name="cupon_name" type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
              @endif
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                      @if(Session::has('cupon_name'))
                        <li>SubTotal <span>${{ $subtotal  }}</span></li>
                        <li>Discount <span>{{ session()->get('cupon_name')['discount'] }} %
                        (${{ $discount =  session()->get('cupon_name')['discount'] }} )</span></li>
                        <li>Total <span>${{ $subtotal - $discount }}</span></li>
                        @else
                        <li>Total <span>${{ $subtotal }}</span></li>
                        @endif
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
