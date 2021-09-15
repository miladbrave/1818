@extends('back.layout.master')

@section('content')
    @include('back.layout.sidebar')
    <div class="main-container gray-bg" id="app">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 animatedParent animateOnce z-index-46">
                    <div class="panel panel-default animated fadeInUp">
                        <div class="panel-body min-height-100">
                            <h1 class="page-title">
                                <span class="fa fa-list"></span>
                                لیست فاکتور ها

                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        onclick="test()"
                                        data-target="#modal-location-edit">زرین پال
                                </button>

                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#modal-fail-pay">پرداخت های ناموفق
                                </button>
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 4%">کاربر</th>
                                            <th class="text-center" style="width: 6%">شماره فاگتور</th>
                                            {{--                                            <th class="text-center">قیمت</th>--}}
                                            <th class="text-center" style="width: 5%">شهر</th>
                                            <th class="text-center" style="width: 15%">آدرس</th>
                                            <th class="text-center" style="width: 9%">کدپستی</th>
                                            <th class="text-center" style="width: 9%">تلفن</th>
                                            <th class="text-center" style="width: 8%">تاریخ</th>
                                            <th class="text-center">وضعیت</th>
                                            <th class="text-center">شناسه</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($userlists as $userlist)
                                            <tr>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['fname']}} {{\App\User::where('id',$userlist->user_id)->first()['lname']}}</td>
                                                <td class="text-center">{{$userlist->factor}}</td>
                                                {{--                                                <td class="text-center">{{number_format($userlist->totalprice)}}</td>--}}
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['city']}}</td>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['address']}}</td>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['postcode']}}</td>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['phone']}}</td>
                                                <td class="text-center">{{Verta::instance($userlist->created_at)->format('%B %d، %Y')}}</td>
                                                <td class="text-center">{!! $userlist->status_pay !!}</td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('factors.update',[$userlist->factor])}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="row">
                                                            <div class="clearfix">
                                                                <div style="margin-right: 5%"
                                                                     class="radio radio-inline radio-replace radio-success">
                                                                    <input type="radio" name="delivery"
                                                                           @if(is_null($userlist->receive) or $userlist->receive == "باربری")
                                                                           checked
                                                                           @endif
                                                                           value="باربری">
                                                                    <label>باربری</label>
                                                                </div>
                                                                <div style="margin-right: 10%"
                                                                     class="radio radio-inline radio-replace radio-danger">
                                                                    <input type="radio" name="delivery"
                                                                           @if($userlist->receive == "تیپاکس")
                                                                           checked
                                                                           @endif
                                                                           value="تیپاکس">
                                                                    <label>تیپاکس</label>
                                                                </div>
                                                            </div>
                                                            <div style="margin-top: 5%">
                                                                <input class="form-group" name="shenase" type="text"
                                                                       size="10"
                                                                       value="{{$userlist->shenase}}">
                                                                <input class="btn btn-default btn-rounded btn-sm"
                                                                       type="submit" value="ثبت">
                                                                <button class="btn btn-default btn-rounded btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#{{$userlist['id']}}"
                                                                        type="button"> نمایش
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="container">
                                    {{ $userlists->links() }}
                                </div>
                            </div>
                        </div>
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
                            <h5 class="modal-title" id="{{$userlist['id']}}"> شماره فاکتور : {{$userlist->factor}}</h5>
                            <span>
                                <strong> نوع ارسال : </strong>
                                @if($userlist->receiveprice == 0)
                                    <span class="badge badge-danger">تیپاکس</span>
                                @elseif($userlist->receiveprice == 1)
                                    <span class="badge badge-danger">باربری</span>
                                @elseif($userlist->receiveprice == 2)
                                    <span class="badge badge-danger">پیک موتوری</span>
                                @elseif($userlist->receiveprice == 3)
                                    <span class="badge badge-danger">حضوری</span>
                                @endif
                            </span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @if(isset($purchlist))
                                    @foreach($purchlist as $purch)
                                        @foreach($purch->where('factor_number',$userlist->id) as $pur)
                                            @foreach($purchl->where('id',$pur->product_id) as $p)
                                                <div class="col-md-3">
                                                    @if(isset($p->photos()->first()->path))
                                                        <img src="{{asset($p->photos->first()->path)}}" alt=""
                                                             width="100%"
                                                             height="100px">
                                                    @else
                                                        <img
                                                            src="{{asset('/front/img/1.jpg')}}"
                                                            alt="آذر یدک ریو" title="آذر یدک ریو"
                                                            class="img-responsive"/>
                                                    @endif
                                                    {{$p->name}}<br>
                                                    <span class="text-danger">{{number_format($p->price)}} ریال</span>
                                                    <br>
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
                            <span class="text-left text-danger">{{number_format($userlist->totalprice)}} ریال</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="modal fade" id="modal-location-edit" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="now-ui-icons location_pin"></i>
                        پرداخت های unVerified زرین پال
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border-top mt-3">
                    <div class="form-ui dt-sl">
                        <div class="testapi">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-fail-pay" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="now-ui-icons location_pin"></i>
                        پرداخت های ناموفق
                    </h5>
                </div>
                <div class="modal-body border-top mt-3">
                    <div class="form-ui dt-sl">
                        @foreach($pays as $pay)
                            <div class="table-responsive">
                                <table class="table table-striped table-border table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 15%">کاربر</th>
                                        <th class="text-center" style="width: 10%">وضعیت</th>
                                        <th class="text-center" style="width: 15%">تاریخ</th>
                                        <th class="text-center">پیام</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">{{app\User::find($pay->user_id)->fullname}}</td>
                                        <td class="text-center">@if($pay->status == "failed") failed @else null  @endif</td>
                                        <td class="text-center">{{Verta::instance($pay->created_at)->format('%B %d، %Y')}}</td>
                                        <td class="text-center">{{$pay->message}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js1')
    <script>
        function test() {
            $.post('https://api.zarinpal.com/pg/v4/payment/unVerified.json', {
                "_token": "{{ csrf_token() }}",
                "merchant_id": "654f335c-c725-4ec3-b77c-9e4760e515c7",
            }, res => {
                $('.testapi').text(res)
            })
        }
    </script>
@endsection
