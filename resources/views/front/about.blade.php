@extends('front.layout.master')

@section('content')
    <div class="wrapper-wide">
        <div id="container">
            <div class="container">
                <!-- Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{route('about')}}">درباره ما</a></li>
                </ul>
                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h1 class="title">درباره ما</h1>
                        <div class="row">
                            <div class="col-sm-12">
                                <p style="font-family: 'IRANSansWeb', sans-serif;font-size: 18px;line-height: 25px;text-align: justify">
                                    این فروشگاه اینترنتی به مدیریت مهندس محمد حسین مدافعی مفتخر است قطعات کامل خودرو
                                    (همه قطعات) در تبریز را بصورت آنلاین و همچنین
                                    حضوری ارائه نماید.انواع قطعات خودرو، قطعات و ملزومات موتور، مواد و قطعات مصرفی
                                    خودرو، مشاوره و راهنمایی در خرید اقلام مورد نیاز و تامین قطعات اصل و اورجینال خودرو
                                    در تبریز قابل ارائه‌‌ می‌باشند.
                                    <br>(به صورت تخصصی در مورد خودرو های ریو)

                                <div class="row">
                                    <div class="col-md-4 m-2">
                                        <img src="{{asset('/front/img/a1.jpg')}}" width="100%" alt="اذر یدک ریو" style="height: 225px">
                                    </div>

                                    <div class="col-md-4 m-2">
                                        <img src="{{asset('/front/img/a2.jpg')}}" width="100%" alt="اذر یدک ریو">
                                    </div>

                                    <div class="col-md-4 m-2">
                                        <img src="{{asset('/front/img/a3.jpg')}}" width="100%" alt="اذر یدک ریو">
                                    </div>
                                </div>

                                <hr style="border-top: 2px black dashed">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
