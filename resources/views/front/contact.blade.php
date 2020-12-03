@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{route('contact')}}">تماس با ما</a></li>
            </ul>
            <div class="row">
                <div id="content" class="col-sm-9">
                    <h1 class="title">تماس با ما</h1>
                    <div class="row">
                        <div class="col-sm-3"><img src="{{asset('/front/img/1.jpg')}}"
                                                   alt="قالب مارکت شاپ" title="قالب مارکت شاپ" class="img-thumbnail"/>
                        </div>
                        <div class="col-sm-3"><strong>آدرس</strong><br/>
                            <address>
                                آذربایجان شرقی، تبریز<br/>
                                چهار اره شهید بهشتی<br/>
                                (منصور سابق)
                            </address>
                        </div>
                        <div class="col-sm-3" style="direction: ltr"><strong>شماره تلفن</strong><br>
                            09149163726 <br/>
                            <br/>
                            <strong style="direction: ltr">شبکه های اجتماعی (تلگرام واتساپ)</strong><br>
                            09149163726
                        </div>
                        <div class="col-sm-3"><strong>ساعات کار</strong><br/>
                            همه روزه 8 الی 20<br/>
                            <br/>
                            <strong>ایمیل:</strong><br/>
                            Mmodafei@gmail.com
                        </div>
                        <div class="col-md-12" style="margin-bottom: 2%">
                            <h5 style="line-height: 25px;font-family: 'IRANSansWeb', sans-serif">مشتریان گرامی جهت
                                پرداخت بصورت کارت به کارت میتوانند مبلغ مورد نظر را به شماره کارت زیر پرداخت نموده، سپس
                                اسکرین شات مربوط به پرداخت را به شماره موبایل مذکور در بالا ارسال نمایند.
                            </h5>
                        </div>

                        <div class="col-md-3 col-xs-6 pull-right">
                            <span
                                style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px">شماره کارت بانک تجارت :</span>
                        </div>
                        <div class="col-md-3 col-xs-6 pull-right">
                            <span style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px;color: red">۵۸۵۹۸۳۱۰۳۳۱۴۲۷۵۲</span>
                        </div>
                        <div class="col-md-4 pull-right">
                            <span
                                style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px">بنام محمد حسین مدافعی</span>
                        </div>
                    </div>
                    <br>


                    <form class="form-horizontal" action="{{route('contact.messages')}}" method="post">
                        @csrf
                        <fieldset class="mt-5">
                            <h3 class="subtitle">با ما ارتباط برقرار کنید</h3>
                            @if(Session::has('message'))
                                <div class="alert alert-success container" style="width: 100%">
                                    <div>{{ Session('message') }}</div>
                                </div>
                            @endif
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label pull-right" for="input-name">نام
                                    شما</label>
                                <div class="col-md-10 col-sm-9">
                                    <input type="text" name="name" value="" id="input-name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label pull-right" for="input-email">آدرس
                                    ایمیل</label>
                                <div class="col-md-10 col-sm-9">
                                    <input type="text" name="email" value="" id="input-email" class="form-control"
                                           required/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label pull-right"
                                       for="input-enquiry">پرسش</label>
                                <div class="col-md-10 col-sm-9">
                                    <textarea name="description" rows="10" id="input-enquiry"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row pull-right">
                                <div class="col-md-12">
                                    {!! NoCaptcha::display() !!}
                                </div>
                                <div class="col-md-6">
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <h3 class="text-danger">{{ $errors->first('g-recaptcha-response') }}</h3>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="ارسال"/>
                            </div>
                        </div>
                    </form>
                </div>
                <aside id="column-right" class="col-sm-3 hidden-xs">
                    <div class="list-group" style="margin-top: 6%">
                        <h2 class="subtitle">آذر یدک ریو</h2>
                        <p style="text-align: justify;font-size: 16px;font-family: 'IRANSansWeb', sans-serif;line-height: normal">
                            این فروشگاه اینترنتی به مدیریت مهندس محمد حسین مدافعی مفتخر است قطعات کامل خودرو (همه قطعات)
                            و به صورت تخصصی تر قطعات ریو
                            در تبریز را بصورت آنلاین و همچنین
                            حضوری ارائه نماید. انواع قطعات خودرو، قطعات و ملزومات موتور، مواد و قطعات مصرفی خودرو،
                            مشاوره و راهنمایی در خرید اقلام مورد نیاز و تامین قطعات اصل و اورجینال خودرو در تبریز قابل
                            ارائه‌‌ می‌باشند.
                            <br>(به صورت تخصصی در مورد خودرو های ریو)
                        </p>
                    </div>
                    <hr class="subtitle">
                    <div class="banner owl-carousel">

                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b1.jpg')}}" alt="small banner"
                                    class="img-responsive"/></a></div>
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b2.jpg')}}" alt="small banner1"
                                    class="img-responsive"/></a></div>
                    </div>
                </aside>
            </div>
        </div>
    </div>



@endsection


