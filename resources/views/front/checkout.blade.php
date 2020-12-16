@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{route('cart.self')}}">سبد خرید</a></li>
                <li><a href="{{route('checkout')}}">تسویه حساب</a></li>
            </ul>
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">تسویه حساب</h1>
                    <hr>
                    <div class="row">
                        <h4>لطفا جای های خالی را پر کنید.</h4>
                        <div class="col-sm-12">
                            <div class="row" id="app2">
                                <form method="post" action="{{route('updateuser')}}">
                                    @csrf
                                    @method('PATCH')


                                    <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-truck"></i> شیوه ی تحویل</h4>
                                            </div>
                                            <div class="panel-body">
                                                <p>لطفا یک شیوه حمل و نقل انتخاب کنید:</p>
                                                <div class="row">
                                                    {{--                                                    <div class="col-md-12">--}}
                                                    {{--                                                        <label>--}}
                                                    {{--                                                            <input type="radio" name="send" v-model="selected"--}}
                                                    {{--                                                                   value="14000">--}}
                                                    {{--                                                            پست سفارشی</label>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="col-md-12">--}}
                                                    {{--                                                        <label>--}}
                                                    {{--                                                            <input type="radio" name="send" v-model="selected"--}}
                                                    {{--                                                                   value="20000">--}}
                                                    {{--                                                            پست پیشتاز</label>--}}
                                                    {{--                                                    </div>--}}
                                                    <div class="col-md-12">
                                                        <label>
                                                            <input type="radio" name="send" v-model="selected"
                                                                   value="0">
                                                            تیپاکس (پس کرایه)</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>
                                                            <input type="radio" name="send" v-model="selected"
                                                                   value="0">
                                                            باربری (پس کرایه)</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>
                                                            <input type="radio" name="send" v-model="selected"
                                                                   value="0">
                                                            پیک موتوری در تبریز (پس کرایه)</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>
                                                            <input type="radio" name="send" v-model="selected"
                                                                   value="0">
                                                            دریافت حضوری</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-book"></i> مشخصات فردی</h4>
                                            </div>
                                            <div class="panel-body">
                                                <fieldset id="address" class="required">
                                                    <div class="form-group col-md-3">
                                                        <label for="input-payment-company"
                                                               class="control-label">ایمیل</label>
                                                        <input type="text" class="form-control"
                                                               id="input-payment-company"
                                                               placeholder="ایمیل" value="{{$user->email}}" name="email"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="input-payment-company"
                                                               class="control-label">تلفن</label>
                                                        <input type="text" class="form-control"
                                                               id="input-payment-company"
                                                               placeholder="تلفن" value="{{$user->phone}}" name="phone">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="input-payment-company"
                                                               class="control-label">نام خانوادگی</label>
                                                        <input type="text" class="form-control"
                                                               id="input-payment-company"
                                                               placeholder="نام خانوادگی" value="{{$user->lname}}"
                                                               name="lname">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="input-payment-company"
                                                               class="control-label">نام</label>
                                                        <input type="text" class="form-control"
                                                               id="input-payment-company"
                                                               placeholder="نام" value="{{$user->fname}}" name="fname">
                                                    </div>

                                                    <div class="form-group required col-md-4">
                                                        <label for="input-payment-city"
                                                               class="control-label">استان</label>
                                                        <input type="text" class="form-control" id="input-payment-city"
                                                               placeholder="استان" value="{{$user->province}}"
                                                               name="province">
                                                    </div>
                                                    <div class="form-group required col-md-4">
                                                        <label for="input-payment-city"
                                                               class="control-label">شهر</label>
                                                        <input type="text" class="form-control" id="input-payment-city"
                                                               placeholder="شهر" value="{{$user->city}}" name="city">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="input-payment-postcode" class="control-label">کد
                                                            پستی</label>
                                                        <input type="text" class="form-control"
                                                               id="input-payment-postcode"
                                                               placeholder="کد پستی" value="{{$user->postcode}}"
                                                               name="postcode">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="input-payment-address-1" class="control-label">آدرس
                                                        </label>
                                                        <input type="text" class="form-control"
                                                               id="input-payment-address-1"
                                                               placeholder="آدرس 1" value="{{$user->address}}"
                                                               name="address">
                                                    </div>
                                                    <small class="text-danger"> لطفا جاهای خالی را با دقت پر کنید.عواقب
                                                        هر
                                                        گونه اشتباه در آدرس و یا کد پستی بر عهده خود خریدار می
                                                        باشد.</small>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-pencil"></i> افزودن توضیح برای
                                                    سفارش.</h4>
                                            </div>
                                            <div class="panel-body">
                                            <textarea rows="4" class="form-control" id="confirm_comment"
                                                      name="comments"></textarea>
                                                <br>
                                                <label class="control-label" for="confirm_agree">
                                                    <input type="checkbox" checked="checked" value="1" required=""
                                                           class="validate required" id="confirm_agree"
                                                           name="confirm agree">
                                                    <span><a class="agree" href="#"><b>شرایط و قوانین</b></a> را خوانده ام و با آنها موافق هستم.</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <td class="text-center">تصویر</td>
                                                            <td class="text-center">نام محصول</td>
                                                            <td class="text-center">تعداد</td>
                                                            <td class="text-center">قیمت واحد</td>
                                                            <td class="text-center">کل</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if($cart)
                                                            @foreach($cart->items as $product)
                                                                <tr>
                                                                    <td class="text-center" width="15%">
                                                                        @if(isset($product['item']->photos()->first()->path))
                                                                            <a
                                                                                href="{{route('product.self',['slug' => $product['item']->slug])}}"><img
                                                                                    src="{{asset($product['item']->photos()->first()->path)}}"
                                                                                    alt="{{$product['item']->name}}"
                                                                                    title="{{$product['item']->name}}"
                                                                                    class="img-thumbnail"/>
                                                                            </a>
                                                                        @else
                                                                            <img
                                                                                src="{{asset('/front/img/1.jpg')}}"
                                                                                alt="آذر یدک ریو" title="آذر یدک ریو"
                                                                                class="img-responsive"/>
                                                                        @endif

                                                                    </td>
                                                                    <td class="text-left">
                                                                        @if(isset($product['item']->slug))
                                                                            <a
                                                                                href="{{route('product.self',['slug' => $product['item']->slug])}}">
                                                                                {{$product['item']->name}}
                                                                            </a>
                                                                        @else
                                                                            <a
                                                                                href="{{route('downloads')}}">
                                                                                {{$product['item']->title}}
                                                                            </a>
                                                                        @endif
                                                                        <br/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <div class="input-group btn-block"
                                                                             style="max-width: 200px;">
                                                                            <span>{{$product['qty']}}</span></div>
                                                                    </td>
                                                                    <td class="text-center">{{\App\Helpers\Helpers::discount($product['item']->price,$product['item']->discount)}}
                                                                        تومان
                                                                    </td>
                                                                    <td class="text-center">{{$product['price']}}
                                                                        تومان
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong> کل:</strong>
                                                            </td>
                                                            <td class="text-right">{{Session::get('cart')->totalPrice}}
                                                                ریال
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>هزینه ارسال
                                                                    :</strong></td>
                                                            <td class="text-right" v-html="selected +  'تومان'"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>جمع کل :</strong>
                                                            </td>
                                                            <td class="text-right" v-html="paytotal + 'ریال'"> </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input type="submit" class="btn btn-primary" id="button-confirm"
                                                   value="تایید سفارش">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js2')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.9/vue.min.js"></script>

    <script>
        vm = new Vue({
            el: '#app2',
            data: {
                selected: "0"
            },
            computed: {
                paytotal: function () {
                    if (this.selected) {
                        return parseInt(this.selected) + parseInt({{Session::get('cart')->totalPrice}});
                    } else {
                        return 0;
                    }
                }
            }
        });
    </script>

@endsection
