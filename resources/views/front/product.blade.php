@extends('front.layout.master')

@section('content')
    @if(Session::has('buy'))
        <div class="alert alert-success container" style="width: 100%">
            <div>{{ Session('buy') }}</div>
        </div>
    @endif
{{--@if(Session::has('buy'))--}}
{{--    <div class="alert alert-danger container" style="width: 100%">--}}
{{--        <div>{{ Session('buy') }}</div>--}}
{{--    </div>--}}
{{--@endif--}}
    <div id="container">
        <div class="container">
            <div class="row">
                <div id="content" class="col-sm-9">
                    <div itemscope itemtype="{{route('product.self',$product->slug)}}">
                        <h1 class="title" itemprop="name" style="font-family: IRANSansWeb">{{$product->name}}</h1>
                        <div class="row product-info">
                            <div class="col-sm-5">
                                <div class="image">
                                    @if(isset($product->photos()->first()->path))
                                        <img class="img-responsive" itemprop="image" id="zoom_01"
                                             src="{{asset($product->photos()->first()->path)}}"
                                             title="{{$product->name}}"
                                             alt="{{$product->name}}"
                                             data-zoom-image="{{asset($product->photos()->first()->path)}}"/>
                                    @else
                                        <img
                                            src="{{asset('/front/img/1.jpg')}}"
                                            alt="آذر یدک ریو" title="آذر یدک ریو"
                                            class="img-responsive"/>
                                    @endif
                                </div>
                                <div class="center-block text-center"><span class="zoom-gallery"><i
                                            class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span></div>
                                <div class="image-additional" id="gallery_01">
                                    @if(isset($product->photos()->first()->path))
                                        @foreach($product->photos as $photo)
                                            <a class="thumbnail" href="#"
                                               data-zoom-image="{{asset($photo->path)}}"
                                               data-image="{{asset($photo->path)}}" title="{{$product->name}}">
                                                <img src="{{($photo->path)}}" style="height: 80px"
                                                     title="{{$product->name}}" alt="{{$product->name}}"/></a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <ul class="list-unstyled description">
                                    <li><b>برند :</b> <span itemprop="brand">{{$brand->title}}</span></li>
                                    <li><b>کد محصول :</b> <span itemprop="mpn">{{$product->sku}}</span></li>
                                    <li><b>موجود در انبار :</b><span itemprop="brand">
                                           @if($product->count > 0 && $product->exist == 1)
                                                {{$product->count}}
                                            @else
                                                <span class="text-danger">اتمام موجودی!</span>
                                            @endif
                                        </span>
                                    </li>
                                    <li><b>دستبه بندی :</b>
                                        @if(isset($product->categories()->first()->title))
                                            <span
                                                itemprop="brand">{{$product->categories()->first()->title}}</span>
                                        @endif
                                    </li>
                                    <li><b>وضعیت موجودی :</b>
                                        @if($product->exist == 1)
                                            <span class="instock small">موجود</span>
                                        @elseif($product->exist == 2)
                                            <span class="nostock small">نا موجود</span>
                                        @endif
                                    </li>
                                </ul>
                                @if($product->exist == 1)
                                    <ul class="price-box">
                                        <li class="price" itemprop="offers" itemscope
                                            itemtype="http://schema.org/Offer">
                                        <span itemprop="price" style="font-size: 40px">{{number_format(\App\Helpers\Helpers::discount($product->price,$product->discount))}} ریال <span
                                                itemprop="availability" content="موجود"></span></span></li>
                                        @if($product->disprice)
                                            <span class="price-old"
                                                  style="font-size: 20px!important;">{{$product->disprice}} ریال </span>
                                        @endif
                                    </ul>
                                    <div id="product ">
                                        <div class="cart">
                                            @if($product->count > 0)
                                                <div class="btn btn-success pull-left" style="border-radius: 10px">
                                                    <i class="fa fa-cart-plus" style="font-size: 20px"></i>
                                                    <a class="btn-success"
                                                       href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                                    </a>
                                                </div>
                                            @else
                                                <span class="text-danger">اتمام موجودی انبار</span>
                                            @endif
                                        </div>
                                    </div>

                                @elseif($product->exist == 2)
                                    <h4 style="padding-bottom: 15%;%;font-weight: bold;color: red">موجود نمی
                                        باشد.</h4>
                                @endif
                                <div class="buy-icon">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-3">
                                            <img src="{{asset('/front/img/images1.png')}}" alt="express"
                                                 style="width: 100%;margin-top: -20%" class="img-responsive">
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <span>ارسال سریع و مطمئن</span>
                                        </div>
                                        <div class="col-md-2 col-xs-2">
                                            <img src="{{asset('/front/img/image2.png')}}" alt="express"
                                                 class="img-responsive"
                                                 style="width: 100%">
                                        </div>
                                        <div class="col-md-2 col-xs-2">
                                            <span>ضمانت اصل بودن</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" style="margin-top: 5%">
                            <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
                            <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
                        </ul>
                        <div class="tab-content">
                            <div itemprop="description" id="tab-description" class="tab-pane active">
                                <div style="margin-top: 3%;text-align: justify">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div id="tab-specification" class="tab-pane">
                                <div id="tab-specification" class="tab-pane">
                                    <table class="table table-striped table-dark">
                                        <tbody>
                                        @foreach($product->attributevalus as $attributes)
                                            <tr>
                                                <td>{{$attributes->attribute->title}}</td>
                                                <td>{{$attributes->title}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div id="column-right">
                        <h3 class="subtitle">سایر محصولات</h3>
                        <div class="side-item">
                            @foreach($randomProducts as $randomProduct)
                                <div class="product-thumb clearfix">
                                    <div class="image" style="width: 100%!important;height: auto!important;">
                                        <a href="{{route('product.self',$randomProduct->slug)}}">
                                            @if(isset($randomProduct->photos()->first()->path))
                                                <img src="{{asset($randomProduct->photos()->first()->path)}}"
                                                     alt="{{$randomProduct->name}}"
                                                     title="{{$randomProduct->name}}"
                                                     style="height: 100px!important;"
                                                     class="img-responsive"
                                                />
                                            @else
                                                <img
                                                    src="{{asset('/front/img/1.jpg')}}"
                                                    alt="آذر یدک ریو" title="آذر یدک ریو"
                                                    class="img-responsive" style="height: 100px!important;"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h3 style="font-size: 15px!important">
                                            <a href="{{route('product.self',$randomProduct->slug)}}">{{$randomProduct->name}}</a>
                                        </h3>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h3 class="subtitle">محصولات مرتبط</h3>
                <div class="owl-carousel related_pro">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="product-thumb">
                            <div class="image">
                                <a href="{{route('product.self',$relatedProduct->slug)}}">
                                    @if(isset($relatedProduct->photos->first()->path))
                                        <img
                                            src="{{asset($relatedProduct->photos->first()->path)}}"
                                            alt="{{$relatedProduct->title}}" title="{{$relatedProduct->title}}"
                                            class="img-responsive"/>
                                    @else
                                        <img
                                            src="{{asset('/front/img/1.jpg')}}"
                                            alt="آذر یدک ریو" title="آذر یدک ریو"
                                            class="img-responsive"/>
                                    @endif
                                </a>
                            </div>
                            <div class="caption">
                                <h4>
                                    <a href="{{route('product.self',$relatedProduct->slug)}}">{{$relatedProduct->name}}</a>
                                </h4>
                                @if($relatedProduct->exist == 1)
                                    @if($relatedProduct->discount)
                                        <p class="price">
                                            <span class="price-new">{{\App\Helpers\Helpers::discount($relatedProduct->price,$relatedProduct->discount)}} ریال</span><br>
                                            <span
                                                class="price-old">{{$product->price}} ریال</span>
                                            <span
                                                class="saving">-{{$product->discount}}%</span>
                                        </p>
                                    @else
                                        <p class="price">
                                            <span class="price-new">{{number_format($relatedProduct->price)}} ریال</span>
                                        </p>
                                    @endif
                                @elseif($product->exist == 2)
                                    <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی باشد.</h4>
                                @endif
                            </div>
{{--                            <div class="btn btn-success pull-left" style="border-radius: 10px">--}}

{{--                                <a class="btn-success"--}}
{{--                                   href="{{route('add.cart',['id'=>$product->id])}}"><span><i class="fa fa-cart-plus"--}}
{{--                                                                                              style="font-size: 20px"></i>افزودن به سبد</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
