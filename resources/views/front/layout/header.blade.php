<div id="header">
    <div class="test" id="app">
        <nav id="top" class="htop" style="background-color: rgba(0,0,0,0.4)">
            <div class="container">
                <div class="row" style="padding-top: 1%">
                    <div class="pull-left flip left-top">
                        <div class="links">
                            <ul>
                                <li class="mobile"><i class="fa fa-phone"></i>989149163726+</li>
                                <li class="email"><i class="fa fa-envelope"></i>Mmodafei@gmail.com</li>
                            </ul>
                        </div>
                        <div class="pull-right flip">
                            <ul class="social-bx list-inline d-flex">
                                <li><a href="https://api.whatsapp.com/send?phone=989149163726"
                                       class="fa fa-whatsapp"></a></li>
                                <li><a href="https://www.instagram.com/azar_yadak_rio/?hl=en"
                                       class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="top-links" class="nav flip">
                        <ul>
                            @guest
                                <li class="head" style="color: red"><i class="fa fa-pencil"></i><a
                                        href="{{route('register')}}">ثبت
                                        نام</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="head" style="color: red"><i class="fa fa-sign-in"></i><a
                                            href="{{route('login')}}">ورود</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown nd">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ auth()->user()->fname . '  ' . auth()->user()->lname }} <span
                                            class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                         style="background-color: rgba(0,0,0,0.5)">
                                        <a href="" onclick="event.preventDefault();
                                                     document.getElementById('profile').submit();"
                                           style="padding-right: 6%;color: red">پروفایل</a><br>
                                        @if(auth()->user()->admin == "admin")
                                            <a href="" onclick="event.preventDefault();
                                                     document.getElementById('dashboard').submit();"
                                               style="padding-right: 6%;color: red">پنل مدیریت</a>   <br>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                           style="padding-right: 6%;color: red">
                                            خروج
                                        </a>

                                        <form method="get" id="dashboard"
                                              action="{{route('administrator')}}">
                                        </form>
                                        <form method="get" id="profile"
                                              action="{{route('profile')}}">
                                        </form>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    <div id="cart">
                        <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..."
                                class="heading dropdown-toggle">
                            <span class="cart fa fa-shopping-cart"></span>
                            @if(Session::has('cart'))
                                <span
                                    style="position: absolute;margin-right: -25%;margin-top: -20%;font-size: 13px;color:yellow"
                                    class="fa fa-star"></span>
                            @endif
                        </button>
                        <ul class="dropdown-menu">
                            @if(Session::has('cart'))
                                <li>
                                    <table class="table">
                                        <tbody>
                                        @foreach(Session::get('cart')->items as $product)
                                            <tr>
                                                <td class="text-left" style="width: 30%;">
                                                    <a href="#">
                                                        @if(isset($product['item']->photos->first()->path))
                                                            <img class="img-thumbnail"
                                                                 title="{{$product['item']->name}}"
                                                                 alt="{{$product['item']->name}}"
                                                                 src="{{asset($product['item']->photos()->first()->path)}}"
                                                            >
                                                        @else
                                                            <img
                                                                src="{{asset('/front/img/1.jpg')}}"
                                                                alt="آذر یدک ریو" title="آذر یدک ریو"
                                                                class="img-responsive"/>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-left">
                                                    @if(isset($product['item']->slug))
                                                        <a style="color: red"
                                                           href="{{route('product.self',['slug'=>$product['item']->slug])}}">{{$product['item']->name}}</a>
                                                    @else
                                                        <a style="color: red"
                                                           href="{{route('downloads')}}">{{$product['item']->title}}</a>
                                                    @endif
                                                </td>
                                                <td class="text-right">{{$product['qty']}}عدد</td>
                                                <td class="text-right">{{number_format($product['price'])}} ریال</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>جمع کل</strong></td>
                                                <td class="text-right">{{number_format(Session::get('cart')->totalPurePrice)}}ریال
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>تخفیف</strong></td>
                                                <td class="text-right">{{number_format(Session::get('cart')->totalDiscountPrice)}}
                                                    ریال
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                <td class="text-right">{{number_format(Session::get('cart')->totalPrice)}}ریال
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="checkout"><a href="{{route('cart.self')}}"
                                                               class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;<a
                                                href="{{route('checkout')}}" class="btn btn-primary"><i
                                                    class="fa fa-share"></i>
                                                تسویه حساب</a></p>
                                    </div>
                                </li>
                            @else
                                <p>سبد خرید شما خالی است</p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 inner">
                        <div id="logo">
                            <a href="{{route('home')}}">
                                <img class="img-responsive"
                                     src="{{asset('/front/img/l.png')}}"
                                     title="1818kala" alt="1818kala"
                                     style="max-width: 53%"/>
                                <div class="logo-text">لوازم یدکی اصل، مطمئن و کارشناسی شده</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 inner">
                        <a href="{{route('home')}}">
                            <img src="{{asset('/front/img/rio.png')}}" alt="rio" class="himg">
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 inner">
                        <div id="search" class="input-group">
                            <input id="filter_name" type="text" v-model="search" name="search"
                                   placeholder="جستجو"
                                   @keyup="change()"
                                   class="form-control input-lg search"/>
                            <ul class="search" style="margin-top: 19%;overflow: hidden">
                                <li v-if="flag" v-for="pro in filteredpeoples"
                                    class="list-group-item"><a :href="/product/ + pro.slug" v-html="pro.name"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav id="menu" class="navbar" style="background-color: rgba(0,0,0,0.4)">
            <div class="navbar-header"><span class="visible-xs visible-sm"> منو <b></b></span></div>
            <div class="container">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="home_link" title="خانه" href="{{route('home')}}">خانه</a></li>
                        <li class="menu_brands dropdown"><a href="#">لوازم یدکی</a>
                            <div class="dropdown-menu">
                                <ul style="display: inline-flex; list-style: none;">
                                    @foreach($navcategories as $navcategory)
                                        <li class="dropdown" style=" display: inline;">
                                            <a href="{{route('category',['id'=>$navcategory->title])}}">{{$navcategory->title}}</a>
                                            <div class="dropdown-menu" style="margin-top: -1px">
                                                <ul>
                                                    @foreach($maincategories as $maincategory)
                                                        @if($navcategory->title == $maincategory->type)
                                                            <li>
                                                                <a href="{{route('category',['id'=>$maincategory->title])}}">{{$maincategory->title}}
                                                                    <span>&rsaquo;</span></a>
                                                                {{--                                                                <div class="dropdown-menu">--}}
                                                                {{--                                                                    <ul>--}}
                                                                {{--                                                                        @foreach($subcategories as $subcategory)--}}

                                                                {{--                                                                            @if($maincategory->id == $subcategory->type)--}}
                                                                {{--                                                                                <li>--}}
                                                                {{--                                                                                    <a href="{{route('category',['id'=>$subcategory->title])}}">{{$subcategory->title}} </a>--}}
                                                                {{--                                                                                </li>--}}
                                                                {{--                                                                            @endif--}}
                                                                {{--                                                                        @endforeach--}}
                                                                {{--                                                                    </ul>--}}
                                                                {{--                                                                </div>--}}
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        </li>

                        <li class="information-link"><a href="{{route('fag')}}">سوالات شما</a></li>
                        <li class="information-link"><a href="{{route('about')}}">درباره ما</a></li>
                        <li class="information-link"><a href="{{route('contact')}}">تماس با ما</a></li>
                        <li class="information-link"><a href="{{route('blog')}}">مطالب و اطلاعات خودرویی</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.9/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        new Vue({
            el: '#app',
            data: {
                search: '',
                products: [],
                flag: false,
            },
            mounted() {
                axios.post('/api/searchProducts').then(res => {
                    this.products = res.data.products;
                }).catch(err => {
                    console.log(err)
                })
            },
            computed: {
                filteredpeoples: function () {
                    var self = this;
                    return self.products.filter(function (product) {
                        return product.name.indexOf(self.search) > -1
                    });
                }
            },
            methods: {
                change: function () {
                    if (this.search.length) {
                        this.flag = true;
                    }
                    if (this.search.length < 1) {
                        this.flag = false
                    }
                }
            }
        });
    </script>

@endsection
