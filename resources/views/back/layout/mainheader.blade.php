<div class="main-header row">
    <div class="col-sm-6 col-xs-7">
        <ul class="user-info pull-left">
            <li class="profile-info dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                    <img width="44" class="img-circle avatar" alt="" src="{{asset('/front/img/avatar.jpg')}}">
                        {{$admin->fname}} {{$admin->lname}}
                    <span class="caret"></span></a>
{{--                <ul class="dropdown-menu">--}}
                {{--                    <li><a href="#/"><i class="icon-user"></i>پروفایل من</a></li>--}}
                {{--                    <li><a href="#/"><i class="icon-mail"></i> پیام ها</a></li>--}}
                {{--                    <li><a href="#"><i class="icon-clipboard"></i> وظایف</a></li>--}}
                {{--                    <li class="divider"></li>--}}
                {{--                    <li><a href="#"><i class="icon-cog"></i> تنظیمات اکانت</a></li>--}}
                {{--                    <li><a href="#"><i class="icon-logout"></i> خروج</a></li>--}}
                {{--                </ul>--}}
            </li>
        </ul>
    </div>
    <div class="col-sm-6 col-xs-5">
        <div class="pull-right">
            <ul class="user-info pull-left">
                <li class="notifications dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-attention"></i><span class="badge badge-info">6</span></a>
                    <ul class="dropdown-menu pull-right">
                        <li class="first">
                            <div class="small"><a class="pull-right danger" href="#">علامت به عنوان خوانده شده</a> شما <strong>3</strong> اطلاعیه های جدید دارید.</div>
                        </li>
                        <li>
                            <ul class="dropdown-list">
                                <li class="unread notification-success"><a href="#"><i class="icon-user-add pull-right"></i><span class="block-line strong"> ثبت نام کاربر جدید</span><span class="block-line small">30 ثانیه قبل</span></a></li>
                                <li class="unread notification-secondary"><a href="#"><i class="icon-heart pull-right"></i><span class="block-line strong">یک نفر این مطلب را پسندید</span><span class="block-line small">60 ثانیه قبل</span></a></li>
                                <li class="unread notification-primary"><a href="#"><i class="icon-user pull-right"></i><span class="block-line strong">تنظیمات تغییر کرد</span><span class="block-line small">2 ساعت قبل</span></a></li>
                                <li class="notification-danger"><a href="#"><i class="icon-cancel-circled pull-right"></i><span class="block-line strong">یک نفر این مطلب را پسندید</span><span class="block-line small">60 ثانیه قبل</span></a></li>
                                <li class="notification-info"><a href="#"><i class="icon-info pull-right"></i><span class="block-line strong">یک نفر این مطلب را پسندید</span><span class="block-line small">60 ثانیه قبل</span></a></li>
                                <li class="notification-warning"><a href="#"><i class="icon-rss pull-right"></i><span class="block-line strong">یک نفر این مطلب را پسندید</span><span class="block-line small">60 ثانیه قبل</span></a></li>
                            </ul>
                        </li>
                        <li class="external-last"> <a href="#" class="danger">مشاهده تمام اطلاعیه ها</a> </li>
                    </ul>
                </li>
                <li class="notifications dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-mail"></i><span class="badge badge-secondary">12</span></a>
                    <ul class="dropdown-menu pull-right">
                        <li class="first">
                            <div class="dropdown-content-header"><i class="fa fa-pencil-square-o pull-right"></i>پیام ها</div>
                        </li>
                        <li>
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left"><img alt="" class="img-circle img-sm" src="{{asset('/back/images/domnic-brown.png')}}"></div>
                                    <div class="media-body">
                                        <a class="media-heading" href="#">
                                            <span class="text-semibold">علی احمدی</span>
                                            <span class="media-annotation pull-right">Tue</span>
                                        </a>
                                        <span class="text-muted">پروژه شما برای تلفن های موبایل جالب است من دوست دارم این را بررسی کنم...</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left"><img alt="" class="img-circle img-sm" src="{{asset('/back/images/john-smith.png')}}"></div>
                                    <div class="media-body">
                                        <a class="media-heading" href="#">
                                            <span class="text-semibold">رضا حسینی</span>
                                            <span class="media-annotation pull-right">12:30</span>
                                        </a>
                                        <span class="text-muted">با تشکر از شما برای ارسال چنین محتوایی فوق العاده. نوشتن برجسته بود...</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left"><img alt="" class="img-circle img-sm" src="{{asset('/back/images/stella-johnson.png')}}"></div>
                                    <div class="media-body">
                                        <a class="media-heading" href="#">
                                            <span class="text-semibold">محمد محمدی</span>
                                            <span class="media-annotation pull-right">2 روز قبل</span>
                                        </a>
                                        <span class="text-muted">از شما متشکریم که به ما اعتماد کردید که منبع شما برای محصولات ورزشی با کیفیت بالا باشد...</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left"><img alt="" class="img-circle img-sm" src="{{asset('/back/images/alex-dolgove.png')}}"></div>
                                    <div class="media-body">
                                        <a class="media-heading" href="#">
                                            <span class="text-semibold">محمد نوری</span>
                                            <span class="media-annotation pull-right">10:45</span>
                                        </a>
                                        <span class="text-muted">پس از جلسه جمعه ما در مورد رابطه کسب و کار ما و چقدر خوش شانس بود...</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-left"><img alt="" class="img-circle img-sm" src="{{asset('/back/images/domnic-brown.png')}}"></div>
                                    <div class="media-body">
                                        <a class="media-heading" href="#">
                                            <span class="text-semibold">علی احمدی</span>
                                            <span class="media-annotation pull-right">4:00</span>
                                        </a>
                                        <span class="text-muted">من می خواهم از این فرصت برای تشکر از شما برای همکاری شما در اخطار کامل استفاده کنید...</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="external-last"> <a class="danger" href="#">تمام پیام ها</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
