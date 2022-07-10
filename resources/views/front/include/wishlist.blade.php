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
                                <th>Cart</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($wishlists as $wishlists)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="img/cart/cart-1.jpg" alt="">
                                    <h5>{{$wishlists->getProducts->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$wishlists->getProducts->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                      <form method="post" action="{{url('add/to-cart',$wishlists->id)}}">
                                        @csrf
                                        <input type="hidden" name="price" value="{{$wishlists->getProducts->price}}">
                                      <button type="submit" class="btn btn-danger btn-sm">Add To Cart</button>
                                    </div>
                                    </form>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{route('wishlist.delete',$wishlists->product_id)}}"><span class="icon_close"></span></a>
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
                <br><br>
                <div class="shoping__cart__btns">
                    <a href="{{route('wishlist.delete.all')}}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
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
                      <li>SubTotal <span>$454.98</span></li>
                        <li>Total <span>$454.98</span></li>
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
