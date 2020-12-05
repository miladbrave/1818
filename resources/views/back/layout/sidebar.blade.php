<div class="page-sidebar">
    <header class="site-header">
        <div class="site-logo"><a href="{{route('home')}}"><img src="{{asset('/front/img/l1.png')}}" alt="Mouldifi" title="Mouldifi"></a></div>
        <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
        <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
    </header>
    <ul id="side-nav" class="main-menu navbar-collapse collapse">
        <li class="has-sub">
            <a href="index.html"><i class="icon-user"></i><span class="title"> مدیریت</span></a>
            <ul class="nav">
                <li><a href="{{route('admin.index')}}"><span class="title">ادمین</span></a></li>
                <li><a href="{{route('admin.show','users')}}"><span class="title"> ویرایش اعضا</span></a></li>
                <li><a href="{{route('mainmessage')}}"><span class="title">درج پیام</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-shopping-cart"></i><span class="title"> محصولات</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('product.create')}}"><span class="title"> محصول جدید</span></a></li>
                <li><a href="{{route('product.index')}}"><span class="title">لیست محصول</span></a></li>
                <li><a href="{{route('celler')}}"><span class="title">لیست انبار</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-list"></i><span class="title">دسته بندی ها</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('brand.index')}}"><span class="title">برند ها</span></a></li>
                <li><a href="{{route('category.show','nav')}}"><span class="title"></span>دسته بندی نوار ابزار</a></li>
                <li><a href="{{route('category.show','main')}}"><span class="title"></span>دسته بندی اصلی</a></li>
                <li><a href="{{route('category.show','sub')}}"><span class="title"></span>دسته بندی فرعی</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-product-hunt"></i><span class="title">ویژگی های محصول</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('attribute.index')}}"><span class="title">ایجاد ویژگی</span></a></li>
                <li><a href="{{route('attributeValue.index')}}"><span class="title">ایجاد مقدار ویژگی</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-sliders"></i><span class="title">اسلایدر</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('slider.create')}}"><span class="title">ایجاد اسلایدر</span></a></li>
                <li><a href="{{route('slider.index')}}"><span class="title">لیست اسلایدر ها</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-file"></i><span class="title">بنر</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('banner.create')}}"><span class="title">ایجاد بنر</span></a></li>
                <li><a href="{{route('banner.index')}}"><span class="title">لیست بنر ها</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-envelope"></i><span class="title">پیام ها</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('message.index')}}"><span class="title">پیام های دریافتی</span></a></li>
                <li><a href="{{route('message.show',"send")}}"><span class="title">ارسال پیام</span></a></li>
            </ul>
        </li>
        <li class="has-sub" style="pointer-events:none">
            <a href="collapsed-sidebar.html"><i class="fa fa-percent"></i><span class="title">کوپن تخفیف</span></a>
            <ul class="nav collapse">
                <li><a href=""><span class="title">لیست کوپن ها</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-list"></i><span class="title">فاکتور ها</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('factors.index')}}"><span class="title">لیست فاکتور ها</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-info"></i><span class="title">مطالب خودرویی</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('blog.index')}}"><span class="title">لیست مطالب</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-video-camera"></i><span class="title">ویدیو</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('video.index')}}"><span class="title">لیست ویدیو</span></a></li>
            </ul>
        </li>
    </ul>
</div>
