@extends('front.tema')
@section('home') active @endsection
@section('title') Laravel - E-commerce
@endsection
@section('content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        @php
                            $categories = App\Models\Category::where('status','1')->get();
                        @endphp
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{route('cat.search',$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset('frontend')}}/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Hero Section End -->
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
              @foreach($products as $product)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('frontend')}}/img/products/{{$product->image}}">
                        <h5><a href="{{route('details',$product->id)}}">{{{$product->name}}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                      @foreach($categories as $category)
                        <li class="" data-filter=".filter{{$category->id}}">{{$category->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
          @foreach($categories as $category)
          @php
          $products = App\Models\Products::where('category_id',$category->id)->latest()->get();
          @endphp
          @foreach($products as $product)
          <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{$category->id}}">
              <div class="featured__item">
                  <div class="featured__item__pic set-bg" data-setbg="{{asset('frontend')}}/img/products/{{$product->image}}">
                      <ul class="featured__item__pic__hover">
                          <li><a href="{{route('wishlist',$product->id)}}"><i class="fa fa-heart"></i></a></li>
                          <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                          <form method="post" action="{{url('add/to-cart',$product->id)}}">
                            @csrf
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <li><button href="{{url('add/to-cart')}}"><i class="fa fa-shopping-cart"></i></button></li>
                          </form>
                      </ul>
                  </div>
                  <div class="featured__item__text">
                      <h6><a href="{{route('details',$product->id)}}">{{$product->name}}</a></h6>
                      <h5>${{$product->price}}</h5>
                  </div>
              </div>
          </div>
          @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('frontend')}}/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('frontend')}}/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                          @foreach($lates_products as $lates_product)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('frontend')}}/img/products/{{$lates_product->image}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$lates_product->name}}</h6>
                                    <span>${{$lates_product->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                          @foreach($lates_products as $lates_product)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('frontend')}}/img/products/{{$lates_product->image}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$lates_product->name}}</h6>
                                    <span>${{$lates_product->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                          @foreach($top_reateds as $top_r)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('frontend')}}/img/product/{{$top_r->image}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$top_r->name}}</h6>
                                    <span>${{$top_r->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                          @foreach($top_reateds as $top_r)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('frontend')}}/img/product/{{$top_r->image}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$top_r->name}}</h6>
                                    <span>${{$top_r->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                          @foreach($top_reateds as $top_r)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('frontend')}}/img/product/{{$top_r->image}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$top_r->name}}</h6>
                                    <span>${{$top_r->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                             @foreach($top_reateds as $top_r)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend')}}/img/product/{{$top_r->image}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$top_r->name}}</h6>
                                        <span>${{$top_r->price}}</span>
                                    </div>
                                </a>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset('frontend')}}/img/blog/{{$article->image}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{\Carbon\Carbon::parse($article['created_at'])->diffForHumans() }}</li>
                            <li><i class="fa fa-comment-o"></i>5</li>
                        </ul>
                        <h5><a href="{{route('front.details',$article->id)}}">{{$article->name}}</a></h5>
                        <p>{{ mb_substr(strip_tags($article->description),0,120,'UTF-8')}}... </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
