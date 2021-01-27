@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{route('fag')}}">سوالات متداول</a></li>
            </ul>
            <div class="row">
                <div id="content" class="col-sm-12">
                    <h1 class="title">راهنما و سوالات متداول</h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h3>ثبت و پیگیری سفارش</h3>
                        </div>
                        <div class="col-sm-9">
                            <div class="faq">
                                <div><a href="#faq1" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">1. آیا برای خرید از آذر یدک ریو، حتماً باید در سایت عضو
                                        باشم؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <h5>بلی، آذر یدک ریو برای اعضای خود امتیازات ویژه‌ای در نظر گرفته است که
                                                عبارتند از :
                                            </h5>
                                            <ul>
                                                <li>امکان ارسال خبرنامه و اطلاعیه های سایت
                                                </li>
                                                <li>اطلاع بودن و بهره مندی از تخفیفات ویژه
                                                </li>
                                                <li>پیگیری و کنترل سفارشات
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div><a href="#faq2" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">2. آیا در تمام ساعات شبانه روز‌‌ می‌توانم سفارش خود را ثبت
                                        کنم؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq2" class="panel-collapse collapse">
                                        <div class="panel-body">بلی، در 24 ساعت شبانه روز و 7 روز هفته‌‌ می‌توانید سفارش
                                            خود را ثبت کنید.
                                        </div>
                                    </div>
                                </div>
                                <div><a href="#faq3" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">3. اگر به دلیل قطعی برق یا اینترنت نتوانم سفارشم را تکمیل
                                        کنم، امکان برگشت لیست سفارش وجود دارد؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq3" class="panel-collapse collapse">
                                        <div class="panel-body">بلی، بعد از رفع مشکل پیش آمده، با ورود مجدد به پنل
                                            کاربری خود‌‌ می‌توانید لیست انتخاب شده را در قسمت سبد خرید مشاهده نمایید و
                                            نسبت به تکمیل و نهایی کردن سفارش خود اقدام فرمایید. این لیست تا نهایی شدن
                                            سفارش در پنل شما باقی خواهد ماند.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h3>چگونگی ارسال سفارشات</h3>
                        </div>
                        <div class="col-sm-9">
                            <div class="faq">
                                <div><a href="#faq6" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">1. به چه روشی سفارش من ارسال‌‌ می‌شود؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <h5> در سرتاسر کشور، سفارش‌ها از طریق شرکت تیپاکس و باربری ارسال‌‌
                                                می‌شوند.
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div><a href="#faq4" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">2. هزینه ارسال سفارش به چه صورت محاسبه و اخذ‌‌ می‌شود؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq4" class="panel-collapse collapse">
                                        <div class="panel-body">هزینه ارسال مطابق قیمتهای مصوب شرکت تیپاکس و باربری، بر حسب وزن
                                            مرسوله محاسبه و به صورت پس کرایه می باشد.
                                        </div>
                                    </div>
                                </div>
                                <div><a href="#faq5" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">3. آیا‌‌ می‌توانم سفارشم را در روز و ساعت معینی تحویل بگیرم؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq5" class="panel-collapse collapse">
                                        <div class="panel-body">خیر، در ارسالی ها امکان تنظیم روز و ساعت در حال حاضر
                                            وجود ندارد.
                                        </div>
                                    </div>
                                </div>
                                <div><a href="#faq50" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">4. پس از ثبت سفارش، چقدر طول‌‌ می‌کشد که به دستم برسد؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq50" class="panel-collapse collapse">
                                        <div class="panel-body">سفارشاتی که در شهر تبریز انجام‌‌ می‌شود، در همان روز نیز
                                            قابل ارسال‌‌ می‌باشد. زمان ارسال به دیگر شهرهای کشور معمولاً 48 تا 72 ساعت‌‌
                                            می‌باشد.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h3>نحوه پرداخت</h3>
                        </div>
                        <div class="col-sm-9">
                            <div class="faq">
                                <div><a href="#faq15" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">1. مبلغ سفارشم را چگونه‌‌ می‌توانم پرداخت کنم؟<i
                                            class="fa fa-caret-down"></i></a>
                                    <div id="faq15" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <h5>شما به صورت اینترنتی می‏‌توانید پرداخت خود را انجام دهید و هنگام ثبت
                                                سفارش در مرحله پرداخت، روش پرداخت خود را انتخاب کنید.
                                                همه کاربران می‌توانند از طریق درگاه اینترنتی و با استفاده از همه
                                                کارت‏‌های بانکی عضو شبکه شتاب در سایت آذر یدک ریو، هزینه سفارش را به
                                                صورت آنلاین پرداخت کنند.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div><a href="#faq16" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">2. ممکن است پرداخت اینترنتی ناموفق باشد، ولی مبلغ از حساب من
                                        کم شده باشد؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq16" class="panel-collapse collapse">
                                        <div class="panel-body">گاهی ممکن است در هنگام پرداخت شبکه بانکی قطع شود و
                                            پرداخت ناموفق انجام شود. اما در این مواقع جای نگرانی وجود ندارد. در این حالت
                                            معمولاً پول شما در حساب‏‌های میانی بانک است و خود بانک مغایرت‏‌ها را رفع
                                            کرده و مبلغ را به صورت خودکار به حساب شما برگشت می‌‏دهد. اگر تا 72 ساعت پول
                                            به حسابتان برگشت نخورد، آنگاه با بانک عامل پرداخت اینترنتی تماس بگیرید تا
                                            مغایرت برطرف شود
                                        </div>
                                    </div>
                                </div>
                                <div><a href="#faq17" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">3. آیا پرداخت اینترنتی وجه سفارش در سایت آذر یدک ریو امن است؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq17" class="panel-collapse collapse">
                                        <div class="panel-body">پرداخت اینترنتی به گونه‏‌ای طراحی شده که امن و راحت
                                            باشد. با وجود این شما نه تنها برای خرید از آذر یدک ریو که هنگام هرگونه پرداخت
                                            اینترنتی برای اطمینان از امنیت پرداخت خود
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h3>خدمات پس از فروش</h3>
                        </div>
                        <div class="col-sm-9">
                            <div class="faq">
                                <div><a href="#faq51" data-parent="#accordion" data-toggle="collapse"
                                        class="panel-title">1. اگر کالایی که خریداری کرده ام، ایراد فنی یا آسیب دیدگی
                                        داشت، چه کار باید انجام دهم؟
                                        <i class="fa fa-caret-down"></i></a>
                                    <div id="faq51" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            با خدمات پس از فروش تماس بگیرید (طی تماس تلفنی یا ارسال پیام از طریق
                                                صفحه تماس با ما) کارشناسان آذر یدک ریو در اسرع وقت مشکل شما را پیگیری‌‌
                                                می‌نمایند.

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
