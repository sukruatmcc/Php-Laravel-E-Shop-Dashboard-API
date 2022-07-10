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
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{route('order.post')}}" method="post">
              @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="shipping_first_name" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="shipping_last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="shipping_phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="shipping_email" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" placeholder="Street Address" class="checkout__input__add">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="number" name="post_code">
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>-</span></div>
                            <ul>
                              @foreach($carts as $cart)
                                <li>{{$cart->getProducts->name}}<span>${{$cart->getProducts->price}}</span></li>
                              @endforeach
                            </ul>
                            @if(Session::has('cupon_name'))
                            <div class="checkout__order__total">Total <span>${{$subtotal - session()->get('cupon_name')['discount']}}
                            </span></div>
                            <input type="hidden" name="cupon_discount" value="{{ session()->get('cupon_name')['discount'] }}">
                            <input type="hidden" name="subtotal" value="${{$subtotal}}">
                            <input type="hidden" name="total" value="${{$subtotal - session()->get('cupon_name')['discount']}}">
                            @else
                            <div class="checkout__order__subtotal">Subtotal <span>${{ $subtotal }}</span></div>
                            <input type="hidden" name="subtotal" value="{{$subtotal}}">
                            <input type="hidden" name="total" name="{{$subtotal}}">
                            @endif
                            <h4>Select Payment Method</h4>
                            <div class="checkout__input__checkbox">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    HansCash
                                    <input type="checkbox" id="payment" value="handcash" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal" value="paypal" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
