@extends('front.tema')
@section('front_blog') active @endsection
@section('title') Laravel - E-commerce
@endsection
@section('content')
@include('front.include.category')
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Blog</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Categories</h4>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="#">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Recent News</h4>
                        <div class="blog__sidebar__recent">
                            @foreach($articles as $article)
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{asset('frontend')}}/img/blog/{{$article->image}}" alt="" height="60">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>{{$article->name}}<br /> {{ mb_substr(strip_tags($article->description),0,12,'UTF-8')}}..</h6>
                                    <span>{{\Carbon\Carbon::parse($article['created_at'])->diffForHumans() }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Search By</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Apple</a>
                            <a href="#">Beauty</a>
                            <a href="#">Vegetables</a>
                            <a href="#">Fruit</a>
                            <a href="#">Healthy Food</a>
                            <a href="#">Lifestyle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{asset('frontend')}}/img/blog/{{$article->image}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i style="margin-right: 5px" class="fa fa-calendar-o"></i>{{\Carbon\Carbon::parse($article['created_at'])->diffForHumans() }}</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">{{$article->name}}</a></h5>
                                <p>{{ mb_substr(strip_tags($article->description),0,120,'UTF-8')}}...</p>
                                <a href="{{route('front.details',$article->id)}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
