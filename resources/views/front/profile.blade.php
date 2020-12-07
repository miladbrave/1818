@extends('front.layout.master')

@section('content')
    <div class="pro">
        <div class="container">
            <div class="row">
                <div class="col-md-9 order-md-1">
                    <div class="tab-content n-left">
                        @if(Session::has('message'))
                            <div class="alert alert-success container" style="width: 100%">
                                <div>{{ Session('message') }}</div>
                            </div>
                        @endif
                        <div id="about" class="tab-pane fade in active">
                            <h2>اطلاعات کاربر</h2>
                            <p><span><i class="fa fa-user-circle"></i><span>نام و نام خانوادگی :</span>
                                                    <span class="text-danger h3"
                                                          style="margin-right: 1%">{{auth()->user()->fname}} {{auth()->user()->lname}}</span>
                                                </span></p>
                            <p><span><i class="fa fa-envelope"></i><span>ایمیل :</span>
                                                <span class="text-danger h4"
                                                      style="margin-right: 1%">{{auth()->user()->email}}</span>
                                                </span></p>
                            <p><span><i class="fa fa-map-marker"></i><span>شهر :</span>
                                                         <span class="text-danger h4"
                                                               style="margin-right: 1%">{{auth()->user()->city}}</span>
                                                </span></p>
                            <p><span><i class="fa fa-address-book"></i><span> آدرس :</span>
                                                         <span class="text-danger h4"
                                                               style="margin-right: 1%">{{auth()->user()->address}}</span>
                                                </span></p>
                            <p><span><i class="fa fa-codepen"></i><span>کد پستی :</span>
                                                         <span class="text-danger h4"
                                                               style="margin-right: 1%">{{auth()->user()->postcode}}</span>
                                                </span></p>
                            <p><span><i class="fa fa-phone"></i><span>تلفن تماس :</span>
                                                         <span class="text-danger h4"
                                                               style="margin-right: 1%">{{auth()->user()->phone}}</span>
                                                </span></p>


                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#editprofile" style="margin-top: 5%">
                                ویرایش پروفایل
                            </button>
                            <div class="modal fade" id="editprofile" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel" style="color: #f90800">ویرایش
                                                مشخصات</h3>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" action="{{ route('userUpdate') }}">
                                                @csrf
                                                @method('patch')
                                                <div class="form-group row">
                                                    <label for="fname"
                                                           class="col-md-3 text-md-left order-md-2 text-danger pull-right"> نام
                                                        :</label>
                                                    <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                                        <input id="fname" type="text"
                                                               class="form-control @error('fname') is-invalid @enderror text-right"
                                                               name="fname"
                                                               value="{{auth()->user()->fname}}" required
                                                               autocomplete="fname"
                                                               autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname"
                                                           class="col-md-3 text-md-left order-md-2 text-danger pull-right"> نام
                                                        خانوادگی :</label>
                                                    <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                                        <input id="lname" type="text"
                                                               class="form-control @error('lname') is-invalid @enderror text-right"
                                                               name="lname"
                                                               value="{{auth()->user()->lname}}" required
                                                               autocomplete="lname"
                                                               autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                         </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email"
                                                           class="col-md-3 text-md-left order-md-2 text-danger pull-right"> ایمیل
                                                        :</label>
                                                    <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                                        <input id="email" type="email" disabled
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               name="email"
                                                               value="{{auth()->user()->email}}" required
                                                               autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                         </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email"
                                                           class="col-md-3 text-md-left order-md-2 text-danger pull-right"> شماره
                                                        موبایل :</label>
                                                    <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                                        <input id="phone" type="text"
                                                               class="form-control @error('mobile') is-invalid @enderror"
                                                               name="phone" value="{{auth()->user()->phone}}" required
                                                               autocomplete="phone"
                                                               data-mask="99999999999">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="city"
                                                           class="col-md-3 text-md-left order-md-2 text-danger pull-right"> شهر
                                                        :</label>
                                                    <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                                        <input id="city" type="text"
                                                               class="form-control @error('city') is-invalid @enderror text-right"
                                                               name="city"
                                                               value="{{auth()->user()->city}}" autocomplete="city"
                                                               autofocus>
                                                        @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address"
                                                           class="col-md-3 text-md-left order-md-2 text-danger pull-right"> آدرس
                                                        :</label>
                                                    <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                                        <input id="address" type="text"
                                                               class="form-control @error('address') is-invalid @enderror text-right"
                                                               name="address"
                                                               value="{{auth()->user()->address}}"
                                                               autocomplete="address"
                                                               autofocus>
                                                        @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="postcode"
                                                           class="col-md-3 text-md-left order-md-2 text-danger pull-right"> کد پستی
                                                        :</label>
                                                    <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                                        <input id="postcode" type="text"
                                                               class="form-control @error('postcode') is-invalid @enderror text-right"
                                                               name="postcode"
                                                               value="{{auth()->user()->postcode}}"
                                                               autocomplete="postcode"
                                                               autofocus>
                                                        @error('postcode')
                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-7 pull-right">
                                                        <button type="submit" class="btn btn-success">
                                                            ثبت تغییرات
                                                        </button>
                                                        <button type="button" class="btn btn-warning"
                                                                data-dismiss="modal">بستن
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="adventures" class="tab-pane fade">
                            <h2>پیام ها</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center col-md-2" scope="col">نام</th>
                                    <th class="text-center col-md-8" scope="col">توضیح</th>
                                    <th class="text-center col-md-2" scope="col">تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages->where('user_id',auth()->user()->id) as $message)
                                    <tr>
                                        <td class="text-center col-md-2">{{$message->name}}</td>
                                        <td class="text-center col-md-8">{{$message->description}}</td>
                                        <td class="text-center col-md-2">{{Verta::instance($message->created_at)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="subset" class="tab-pane fade">
                            <h2>سوابق خرید</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center" scope="col">شماره فاکتور</th>
                                    <th class="text-center" scope="col">مبلغ کل</th>
                                    <th class="text-center" scope="col">هزینه کرایه</th>
                                    <th class="text-center" scope="col">وضعیت</th>
                                    <th class="text-center" scope="col">تاریخ</th>
                                    <th class="text-center" scope="col">نمایش جزیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($userlists))
                                    @foreach($userlists as $userlist)
                                        <tr>
                                            <td class="text-center">{{$userlist->factor}}</td>
                                            <td class="text-center">{{$userlist->totalprice}}</td>
                                            <td class="text-center">{{$userlist->receiveprice}}</td>
                                            <td class="text-center">{{$userlist->status}}</td>
                                            <td class="text-center">{{Verta::instance($userlist->created_at)->format('%B %d، %Y')}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-default btn-rounded btn-sm"
                                                        data-toggle="modal" data-target="#{{$userlist['id']}}"
                                                        type="button"><i class="fa fa-envelope"></i> نمایش
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div id="contact" class="tab-pane fade">
                            <h2>ارتباط با مدیریت سایت</h2>
                            <div class="card card-signup">
                                <form action="{{route('contact.messages',['id' => auth()->user()->id])}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-8 pull-right">
                                            <div class="input-group">
                    											 <span class="input-group-addon">
                    												<i class="fa fa-user-circle"></i>موضوع
                    											 </span>
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="موضوع">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 pull-right">
                                            <div class="input-group">
                    											<span class="input-group-addon">
                    											  <i class="fa fa-envelope"></i>پست الکترونیک
                    											</span>
                                                <input type="text" class="form-control" name="email"
                                                       value="{{auth()->user()->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 pull-right">
                                            <div class="input-group">
                    											<span class="input-group-addon">
                    											  <i class="fa fa-pencil"></i>متن پیام
                    											</span>
                                                <textarea placeholder="متن پیام ..." name="description"
                                                          class="form-control" required
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input class="btn btn-primary" type="submit" value="ارسال"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 order-md-2">
                    <div class="n-top"><img src="{{asset('/front/img/avatar.jpg')}}">
                        <h4>{{auth()->user()->fname}} {{auth()->user()->lname}}</h4>
                    </div>
                    <div class="n-right">
                        <ul class="nav nav-pills nav-stacked">
                            <li></li>
                            <li class="active"><a data-toggle="pill" href="#about"><img
                                        src="{{asset('/front/img/User.png')}}">اطلاعات
                                    کاربر</a></li>
                            <li><a data-toggle="pill" href="#subset"><img src="{{asset('/front/img/Bought.png')}}">سوابق
                                    خرید</a></li>
                            <li><a data-toggle="pill" href="#contact"><img src="{{asset('/front/img/Account.png')}}">
                                    ارسال پیام</a></li>
                            <li><a data-toggle="pill" href="#adventures"><img src="{{asset('/front/img/Plan.png')}}">پیام
                                    ها</a></li>
                            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img
                                        src="{{asset('/front/img/Exit.png')}}">
                                    خروج</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(isset($userlists))
        @foreach($userlists as $userlist)
            <div class="modal fade" id="{{$userlist['id']}}" tabindex="-1" role="dialog"
                 aria-labelledby="{{$userlist['id']}}"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{$userlist['id']}}">{{$userlist->fname}}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @if(isset($purchlist))
                                    @foreach($purchlist as $purch)
                                        @foreach($purch->where('factor_number',$userlist->id) as $pur)
                                            @foreach($purchl->where('id',$pur->product_id) as $p)
                                                <div class="col-md-3 pull-right">
                                                    @if(isset($p->photos()->first()->path))
                                                        <img src="{{asset($p->photos->first()->path)}}" alt="" width="100%"
                                                             height="100px">
                                                    @else
                                                        <img
                                                            src="{{asset('/front/img/1.jpg')}}"
                                                            alt="آذر یدک ریو" title="آذر یدک ریو"
                                                            class="img-responsive"/>
                                                    @endif
                                                    {{$p->name}}<br>
                                                    <span class="text-danger">{{$p->price}} تومان</span><br>
                                                    تعداد : {{$pur->count}}
                                                </div>
                                                @if(isset($userlist->comment))
                                                    <span class="text-danger">{{$userlist->comment}}</span>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection



