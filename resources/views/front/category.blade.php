@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <div class="row">
                <aside id="column-left" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">دسته ها</h3>
                    <div class="box-category">
                        <ul id="cat_accordion">
                            @foreach($navcategories as $nav)
                                <li>
                                    <a href="{{route('category',['id'=>$nav->title])}}" class="main">{{$nav->title}}</a>
                                    <span
                                        class="down">
                                    </span>
                                    <ul style="display:block;">
                                        @foreach($maincategories as $main)
                                            @if($nav->title == $main->type)
                                                <li>
                                                    <a href="{{route('category',['id'=>$main->title])}}"
                                                       style="color: red">{{$main->title}}</a>
                                                    <span class="down"></span>
                                                    <ul>
                                                        @foreach($subcategories as $sub)
                                                            @if($main->id == $sub->type)
                                                                <li><a href="{{route('category',['id'=>$sub->title])}}"
                                                                       style="color: red">{{$sub->title}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="banner owl-carousel">
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/m1.jpg')}}" alt="small banner"
                                    class="img-responsive"/></a></div>
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/m2.jpg')}}" alt="small banner1"
                                    class="img-responsive"/></a></div>
                    </div>
                </aside>

                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-home "></i></a></li>
                    @if($title->type !== "null" && !is_numeric($title->type))
                        <li><a href="{{route('category',['id'=>$title->type])}}">{{$title->type}}</a></li>
                    @elseif($title->type !== "null" && is_numeric($title->type))
                        <li>
                            <a href="{{route('category',['id'=>$title->where('id',$title->type)->first()->title])}}">{{$title->where('id',$title->type)->first()->title}}</a>
                        </li>
                    @endif
                    <li><a href="{{route('category',['id'=>$title->title])}}">{{$title->title}}</a></li>
                </ul>

                <div id="content" class="col-sm-9">
                    {{--                    @if(Session::has('buy'))--}}
                    {{--                        <div class="container" id="alert">--}}
                    {{--                            <div class="alert alert-success" style="width: 100%">--}}
                    {{--                                <div>{{ Session('buy') }}</div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}
                    @if(Session::has('buy'))
                        <div class="container" id="alert">
                            <div class="alert alert-danger" style="width: 100%">
                                <div>{{ Session('buy') }}</div>
                            </div>
                        </div>
                    @endif
                    <h1 class="title">{{$title->title}}</h1>
                    <div class="product-filter">
                        <div class="row">
                            <div class="col-md-2 col-sm-5">
                                <div class="btn-group">
                                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip"
                                            title="List"><i class="fa fa-th-list"></i></button>
                                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip"
                                            title="Grid"><i class="fa fa-th"></i></button>
                                </div>
                            </div>
                            <div class="col-md-10 cate">
                                <div class="text-right">
                                    <label for="exampleFormControlSelect1">دسته بندی :</label>
                                    {{--                                    <a href="{{route('category',['id'=>$title->title ,'sort' => 1 ])}}" class="badge"--}}
                                    {{--                                       style="margin-right:5%;background-color: #00d0ff">افزایش قیمت</a>--}}
                                    {{--                                    <a href="{{route('category',['id'=>$title->title ,'sort' => 2 ])}}" class="badge"--}}
                                    {{--                                       style="margin-right:4%;background-color: #00d0ff">کاهش قیمت</a>--}}
                                    {{--                                    <a href="{{route('category',['id'=>$title->title ,'sort' => 3 ])}}" class="badge"--}}
                                    {{--                                       style="margin-right:4%;background-color: #00d0ff">موجود</a>--}}
                                    @foreach($maincategories as $main)
                                        @if($title->title == $main->type || $title->type == $main->type)
                                            <li style="display:inline;"><a
                                                    href="{{route('category',['id'=>$main->title])}}"
                                                    class="badge badge-success">{{$main->title}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row products-category">
                        @if($products)
                            @foreach($products as $product)
                                @if($product->distribute == "انتشار")
                                    <div class="product-layout product-list col-xs-12">
                                        <div class="product-thumb">
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
                                                    <a href="{{route('product.self',$product->slug)}}"> {{$product->name}} </a>
                                                </h3>
                                                {{--                                                <p>{!! Str::limit($product->description,150) !!}</p>--}}
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
                                                    <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود
                                                        نمی
                                                        باشد.</h4>
                                                @endif
                                                @if($product->exist == 1)
                                                    @if($product->count > 0)
                                                        <div class="button-group pull-right">
                                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                                        </div>
                                                        <div class="btn btn-success pull-left"
                                                             style="border-radius: 10px">
                                                            {{--                                                            <i class="fa fa-cart-plus" style="font-size: 20px"></i>--}}
                                                            <a class="btn-success"
                                                               href="{{route('add.cart',['id'=>$product->id])}}"><span>                                                            <i
                                                                        class="fa fa-cart-plus"
                                                                        style="font-size: 20px"></i>
                                                                        افزودن به سبد</span>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <span class="text-danger">اتمام موجودی انبار</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        @if(!isset($product) && $rand->isNotEmpty())
                            @foreach($rand as $ran)
                                @if($ran->distribute == "انتشار")
                                    <div class="product-layout product-list col-xs-12">
                                        <div class="product-thumb">
                                            <div class="image"><a href="{{route('product.self',$ran->slug)}}">
                                                    @if(isset($ran->photos()->first()->path))
                                                        <img
                                                            src="{{asset($ran->photos()->first()->path)}}"
                                                            alt="{{$ran->name}}" title="{{$ran->name}}"
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
                                                    <a href="{{route('product.self',$ran->slug)}}"> {{$ran->name}} </a>
                                                </h3>
                                                {{--                                                <p>{!! Str::limit($product->description,150) !!}</p>--}}
                                                @if($ran->exist == 1)
                                                    @if($ran->discount)
                                                        <p class="price">
                                                            <span class="price-new">{{\App\Helpers\Helpers::discount($ran->price,$ran->discount)}} ریال</span><br>
                                                            <span
                                                                class="price-old">{{$ran->price}} ریال</span>
                                                            <span
                                                                class="saving">-{{$ran->discount}}%</span>
                                                        </p>
                                                    @else
                                                        <p class="price">
                                                            <span class="price-new">{{number_format(\App\Helpers\Helpers::discount($ran->price,$ran->discount))}} ریال</span>
                                                        </p>
                                                    @endif
                                                @elseif($ran->exist == 2)
                                                    <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود
                                                        نمی
                                                        باشد.</h4>
                                                @endif
                                                @if($ran->exist == 1)
                                                    @if($ran->count > 0)
                                                        <div class="button-group pull-right">
                                                            <h5 class="text-info"> در انبار {{$ran->count}} عدد</h5>
                                                        </div>
                                                        <div class="btn btn-success pull-left"
                                                             style="border-radius: 10px">
                                                            {{--                                                            <i class="fa fa-cart-plus" style="font-size: 20px"></i>--}}
                                                            <a class="btn-success"
                                                               href="{{route('add.cart',['id'=>$ran->id])}}"><span>                                                            <i
                                                                        class="fa fa-cart-plus"
                                                                        style="font-size: 20px"></i>
                                                                        افزودن به سبد</span>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <span class="text-danger">اتمام موجودی انبار</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        @if(!isset($product) && $rand->isEmpty())
                            <h2 class="text-danger">متاسفانه محصولی یافت نشد!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js3')
    <script>
        let title = $('.title').text();
        var t = [];
        var elements = document.body.getElementsByClassName("main");
        for (i = 0; i < elements.length; i++) {
            t.push(elements[i].innerText);
            if (elements[i].innerText == title) {
                var active = $(elements[i]).addClass("active");
                var child = $(elements[i]).parents('.cutom-parent-li').children().eq(2)
                var m = child.css("display", "block");
            }
        }
    </script>
@endsection
