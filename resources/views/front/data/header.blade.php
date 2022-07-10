<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i>funnytubeedits3838@gmail.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/in/%C5%9F%C3%BCkr%C3%BC-atmaca-32a425239/"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                        @if(Route::has('login'))
								    @auth
								   @if(Auth::user()->type==="admin")
										<a style="color:black;"  href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="submenu curency" >
											<li class="menu-item" >
												<a title="Dashboard" href="{{route('profile')}}">Profile</a>
											</li>
                      <li class="menu-item" >
												<a title="Dashboard" href="{{route('index')}}">Dashboard</a>
											</li>
														<li class="menu-item">
                               <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
														 </li>
														 <form method="post" action="{{route('logout')}}" id="logout-form">
															 @csrf
											</form>
									 @else
 									 <a href="#" style="color:black;">My Account ({{Auth::user()->name}})<i aria-hidden="true"></i></a>
 									 <ul class="submenu curency" >
                     <li class="menu-item" >
                       <a title="Dashboard" href="{{route('profile')}}">Profile</a>
                     </li>
										 <li class="menu-item">
												<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
											</li>
											<form method="post" action="{{route('logout')}}" id="logout-form">
												@csrf
							 </form>
									 @endif
                     </div>
								@else
                <div class="header__top__right__auth">
                    <a href="{{route('front.login')}}"><i class="fa fa-user"></i> Login</a>
                </div>
                <div class="header__top__right__auth">
                    <a href="{{route('front.register')}}"><i class="fa fa-user" style="margin-left:3px"></i> Register</a>
                </div>
      							@endauth
								@endif
                    </div>
                </div>
        </div>
    </div>
    <div class="container">
      @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
  @endif
  @if(session()->has('danger'))
  <div class="alert alert-danger">
      {{ session()->get('danger') }}
  </div>
@endif
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{route('template')}}"><img src="{{asset('frontend')}}/img/logosss.png" alt="" width="119" height="50"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="@yield('home')"><a href="{{url('/')}}">Home</a></li>
                        <li class="@yield('shop')"><a href="{{route('shop')}}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{route('cart')}}">Shoping Cart</a></li>
                                <li><a href="{{route('checkout')}}">Check Out</a></li>
                                <li><a href="#">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="@yield('front_blog')"><a href="{{route('front.blog')}}">Blog</a></li>
                        <li class="@yield('frontContact')"><a href="{{route('frontContact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                  @php
                  $total = App\Models\Cart::all()->where('user_ip',request()->ip())->sum(function($t){
                    return  $t->price * $t->qty;
                  });
                  $quantity = App\Models\Cart::where('user_ip',request()->ip())->sum('qty');
                  $wishqty = App\Models\Wishlist::where('user_id',Auth::id())->get();
                  @endphp
                    <ul>
                        <li><a href="{{route('wishlist.page')}}"><i class="fa fa-heart"></i> <span>{{count($wishqty)}}</span></a></li>
                        <li><a href="{{route('cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{$quantity}}</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>${{$total}}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
