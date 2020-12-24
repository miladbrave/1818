@extends('front.layout.master')

@section('content')
    @if(Session::has('buy'))
        <div class="container" id="alert">
            <div class="alert alert-success" style="width: 100%">
                <div>{{ Session('buy') }}</div>
            </div>
        </div>
    @endif
    <div class="body">
        <div class="row" style="margin-left: 0px;margin-right: 0px">
            <div id="content" class="col-md-12">
                <div class="container" style="margin-top: 1%">
                    <div class="slideshow single-slider owl-carousel">
                        @foreach($sliders->where('number','ویژه') as $slider)
                            <div class="item slider_img"><a href="{{$slider->link}}">
                                    @if(isset($slider->photo()->first()->path))
                                        <img class="img-responsive"
                                             src="{{asset($slider->photo()->first()->path)}}"
                                             alt="banner 2"/>
                                    @endif
                                </a></div>
                        @endforeach
                        @foreach($sliders->where('number',1) as $slider)
                            <div class="item slider_img"><a href="{{$slider->link}}">
                                    @if(isset($slider->photo()->first()->path))
                                        <img class="img-responsive"
                                             src="{{asset($slider->photo()->first()->path)}}"
                                             alt="banner 2"/>
                                    @endif
                                </a></div>
                        @endforeach
                        @foreach($sliders->where('number',2) as $slider)
                            <div class="item slider_img"><a href="{{$slider->link}}">
                                    @if(isset($slider->photo()->first()->path))
                                        <img class="img-responsive"
                                             src="{{asset($slider->photo()->first()->path)}}"
                                             alt="banner 2"/>
                                    @endif
                                </a></div>
                        @endforeach
                        @foreach($sliders->where('number',3) as $slider)
                            <div class="item slider_img"><a href="{{$slider->link}}">
                                    @if(isset($slider->photo()->first()->path))
                                        <img class="img-responsive"
                                             src="{{asset($slider->photo()->first()->path)}}"
                                             alt="banner 2"/>
                                    @endif
                                </a></div>
                        @endforeach
                    </div>
                </div>
                <div class="marketshop-banner mt-5">
                    <div class="row">
                        @foreach($banners->where('number',1) as $banner)
                            <div class="col-lg-4 col-md-4 col-xs-12" id="banner1"><a
                                    href="{{$banner->link}}">
                                    @if(isset($banner->photo()->first()->path))
                                        <img
                                            src="{{asset($banner->photo()->first()->path)}}"
                                            alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                    @endif
                                    <div class="overlay">{{$banner->title}}</div>
                                </a></div>
                        @endforeach
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            @foreach($banners->where('number',2) as $banner)
                                <div class="col-lg-12 col-md-12 col-xs-6 " id="banner"><a
                                        href="{{$banner->link}}">
                                        @if(isset($banner->photo()->first()->path))
                                            <img
                                                src="{{asset($banner->photo()->first()->path)}}"
                                                alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                        @endif
                                        <div class="overlay" style="bottom: -12%">{{$banner->title}}</div>
                                    </a></div>
                            @endforeach
                            @foreach($banners->where('number',3) as $banner)
                                <div class="col-lg-12 col-md-12 col-xs-6 " id="banner"><a
                                        href="{{$banner->link}}">
                                        @if(isset($banner->photo()->first()->path))
                                            <img
                                                src="{{asset($banner->photo()->first()->path)}}"
                                                alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                        @endif
                                        <div class="overlay">{{$banner->title}}</div>
                                    </a></div>
                            @endforeach
                        </div>
                        @foreach($banners->where('number',4) as $banner)
                            <div class="col-lg-4 col-md-4 col-xs-12 " id="banner4"><a
                                    href="{{$banner->link}}">
                                    @if(isset($banner->photo()->first()->path))
                                        <img
                                            src="{{asset($banner->photo()->first()->path)}}"
                                            alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                    @endif
                                    <div class="overlay">{{$banner->title}}</div>
                                </a></div>
                        @endforeach
                    </div>
                </div>

                <div id="product-tab" class="product-tab" style="padding-top: 3%;padding-bottom: 2%">
                    <ul id="tabs" class="nav nav-pills">
                        <li><a href="#tab-motor">لوازم موتوری</a></li>
                        <li><a href="#tab-gearbox">انتقال قدرت و گیربکس</a></li>
                        <li><a href="#tab-elect">لوازم برقی و سنسورها</a></li>
                        <li><a href="#tab-break">سیستم ترمز</a></li>
                        <li><a href="#tab-oil">روغن، فیلتر و صافی ها</a></li>
                        <li><a href="#tab-ax"> سیستم تعلیق، جلوبندی و چرخ ها</a></li>
                        <li><a href="#tab-side">لوازم جانبی</a></li>
                        <li><a href="#tab-hidro">لوازم هیدرولیک فرمان</a></li>
                        <li><a href="#tab-cold">لوازم سیستم خنکاری </a></li>
                        <li><a href="#tab-Decorating">تزئینات </a></li>
                    </ul>
                    <div id="tab-motor" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',1) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        @if($product->count > 0)
                                            <div class="button-group pull-right">
                                                <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                            </div>
                                            <div class="btn btn-success pull-left" style="border-radius: 10px">
                                                <a class="btn-success"
                                                   href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                            class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                                </a>
                                            </div>
                                        @else
                                            <h5>اتمام موجودی!</h5>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-gearbox" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',2) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-cold" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',10) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-ax" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',5) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-break" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',8) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>

                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-elect" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',3) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-hidro" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',7) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-oil" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',4) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-side" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',6) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>

                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <i class="fa fa-cart-plus" style="font-size: 20px"></i>
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-Decorating" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',9) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}">
                                            @if(isset($product->photos()->first()->path))
                                                <img
                                                    src="{{asset($product->photos()->first()->path)}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"/>
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive"/>
                                            @endif
                                        </a></div>
                                    <div class="caption main">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} ریال</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} ریال</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="btn btn-success pull-left" style="border-radius: 10px">
                                            <a class="btn-success"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span><i
                                                        class="fa fa-cart-plus" style="font-size: 20px"></i>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <section id="subscribe">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="subscribe-title">سوالات خود را از ما بپرسید.</h3>
                                <a class="subscribe-btn" href="{{route('contact')}}">اطلاعات بیشتر</a>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="marketshop-banner2">
                    <div class="row">
                        @foreach($videos as $video)
                            @if($video->status == "انتشار" && $video->number == 1)
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12" id="ad">
                                    <a href="{{route('video',["id" => $video->title])}}">
                                        @if(isset($video->photo->path))
                                            <img src="{{asset($video->photo->path)}}"
                                                 alt="{{$video->title}}"/>
                                        @endif
                                    </a>
                                    <div class="overlay2"><span>{{$video->title}}</span></div>
                                </div>
                            @elseif($video->status == "انتشار" && $video->number == 2)
                                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12" id="ad">
                                    <a href="{{route('video',["id" => $video->title])}}">
                                        @if(isset($video->photo->path))
                                            <img src="{{asset($video->photo->path)}}"
                                                 alt="{{$video->title}}"/>
                                        @endif
                                    </a>
                                    <div class="overlay2"><span>{{$video->title}}</span></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="custom-feature-box">
                    <div class="col-md-3 col-sm-6 col-xs-4">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#buy"
                                 src="{{asset('/front/img/buy.png')}}">
                            <div class="modal fade" id="buy" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">نحوه خرید</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>نحوه خرید از فروشگاه بسیار ساده و راحت می باشد. شما می بایست در ابتدا
                                                یک
                                                حساب کاربری ایجاد کنید، سپس محصولات مورد نیاز خود را به سبد خرید خود
                                                اضافه کرده و در نهایت با انتخاب نحوه ارسال، سفارش خود
                                                را
                                                نهایی کنید.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">بستن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-4">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#setting"
                                 src="{{asset('/front/img/setting.png')}}">
                            <div class="modal fade" id="setting" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">پشتیبانی و مشاوره
                                                فنی</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>شما می توانید جهت مشاوره رایگان و همچنین پشتیبانی فنی محصولات فروشگاه
                                                با
                                                شماره های تماس فروشگاه تماس حاصل فرمایید. لازم به ذکر است که
                                                پشتیبانی
                                                فنی در جهت
                                                راهنمایی برای خرید و جهت رفع مشکلات فنی بعد از خرید می باشد</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">بستن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-4">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#consule"
                                 src="{{asset('/front/img/consule.png')}}">
                            <div class="modal fade" id="consule" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">شماره تماس</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                تماس با دفتر مرکزی فروشگاه:
                                                <br>
                                                شماره تماس: 989149163726
                                                <br>
                                                Mmodafei@gmail.com
                                                <br>
                                                تبریز- چهار راه شهید بهشتی (منصور سابق)
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">بستن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-4">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#send"
                                 src="{{asset('/front/img/send.png')}}">
                            <div class="modal fade" id="send" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">ارسال مطمن</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                شما می توانید با خیال راحت نسبت به ارسال مرسولات اقدام به خرید
                                                نماید.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">بستن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-4">
                        <div class="feature-box fbox_5">
                            <img type="button" data-toggle="modal" data-target="#pay"
                                 src="{{asset('/front/img/pay.png')}}">
                            <div class="modal fade" id="pay" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">شماره حساب</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                بانک تجارت
                                                <br>
                                                <span
                                                    style="font-family: 'IRANSansWeb', sans-serif;font-weight: 600">
                                                    ۵۸۵۹۸۳۱۰۳۳۱۴۲۷۵۲</span>
                                                <br>
                                                محمد حسین مدافعی
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">بستن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="message" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" id="txtHint">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
@endsection
