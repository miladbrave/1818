<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('/front/img/caricon.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/front/img/caricon.png')}}"/>
    <title>1818kala | آذر یدک ریو</title>
    <meta name="keywords" content="1818kala,آذر یدک ریو">
    <meta name="description"
          content="آذر یدک ریو فروشگاه تخصصی در تامین قطعات خودرو به صورت اورجینال و مطمئن"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="http://www.1818kala.ir/"/>
    <meta name="subject" content="آذر یدک ریو car">
    <meta name="copyright" content="آذر یدک ریو 1818kala">
    <meta name="language" content="FA">
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="آذر یدک ریو 1818kala"/>
    <meta property="og:description"
          content="آذر یدک ریو فروشگاه تخصصی در تامین قطعات خودرو به صورت اورجینال و مطمئن"/>
    <meta property="og:url" content="http://1818kala.ir/"/>
    <meta property="og:site_name" content="آذر یدک ریو | 1818kala"/>

    <link type="text/css" rel="stylesheet" href="{{asset('/front/js/bootstrap/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/front/js/bootstrap/css/bootstrap-rtl.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/front/css/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/stylesheet.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/owl.transitions.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/stylesheet-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/responsive-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/stylesheet-skin2.css')}}">


</head>
<body>
<div class="wrapper-wide">
    @include('front.layout.header')
    @yield('content')
    @include('front.layout.footer')
</div>

@yield('js')
@yield('js2')

<script type="text/javascript" src="{{asset('/front/js/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/jquery.easing-1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/jquery.dcjqaccordion.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/swipebox/lib/ios-orientationchange-fix.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/swipebox/src/js/jquery.swipebox.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

@yield('js3')

<script type="text/javascript">
    $("#zoom_01").elevateZoom({
        gallery:'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true,
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 500,
        zoomWindowPosition : 11,
        lensFadeIn: 500,
        lensFadeOut: 500,
        loadingIcon: 'image/progress.gif'
    });
    $("#zoom_01").bind("click", function(e) {
        var ez =   $('#zoom_01').data('elevateZoom');
        $.swipebox(ez.getGalleryList());
        return false;
    });
</script>
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").slideUp(700, function() {
            $(this).remove();
        });
    }, 3000);</script>

</body>
</html>
