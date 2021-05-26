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
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">کاربر</th>
                                            <th class="text-center">شماره فاگتور</th>
                                            <th class="text-center">قیمت</th>
                                            <th class="text-center">شهر</th>
                                            <th class="text-center">آدرس</th>
                                            <th class="text-center">کدپستی</th>
                                            <th class="text-center">تلفن</th>
{{--                                            <th class="text-center">هزینه حمل</th>--}}
                                            <th class="text-center">وضعیت</th>
                                            <th class="text-center">تاریخ</th>
                                            <th class="text-center">جزئیات</th>
                                            <th class="text-center">شناسه</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($userlists as $userlist)
                                            <tr>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['fname']}} {{\App\User::where('id',$userlist->user_id)->first()['lname']}}</td>
                                                <td class="text-center">{{$userlist->factor}}</td>
                                                <td class="text-center">{{$userlist->totalprice}}</td>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['city']}}</td>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['address']}}</td>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['postcode']}}</td>
                                                <td class="text-center">{{\App\User::where('id',$userlist->user_id)->first()['phone']}}</td>
{{--                                                <td class="text-center">{{$userlist->receiveprice}}</td>--}}
                                                <td class="text-center">{{$userlist->status}}</td>
                                                <td class="text-center">{{Verta::instance($userlist->created_at)->format('%B %d، %Y')}}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-default btn-rounded btn-sm"
                                                            data-toggle="modal" data-target="#{{$userlist['id']}}"
                                                            type="button"><i class="fa fa-envelope"></i> نمایش
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('factors.update',[$userlist->factor])}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="row">
                                                            <div class="clearfix">
                                                                <div
                                                                    class="radio radio-inline radio-replace radio-success">
                                                                    <input type="radio" name="delivery"
                                                                           @if(is_null($userlist->receive) or $userlist->receive == "باربری")
                                                                           checked
                                                                           @endif
                                                                           value="باربری">
                                                                    <label>باربری</label>
                                                                </div>
                                                                <div
                                                                    class="radio radio-inline radio-replace radio-danger">
                                                                    <input type="radio" name="delivery"
                                                                           @if($userlist->receive == "تیپاکس")
                                                                           checked
                                                                           @endif
                                                                           value="تیپاکس">
                                                                    <label>تیپاکس</label>
                                                                </div>
                                                            </div>
                                                            <input class="form-group" name="shenase" type="text"
                                                                   value="{{$userlist->shenase}}">
                                                            <input class="btn btn-success" type="submit" value="ثبت">
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
                                                        <img src="{{asset($p->photos->first()->path)}}" alt="" width="100%"
                                                             height="100px">
                                                    @else
                                                        <img
                                                            src="{{asset('/front/img/1.jpg')}}"
                                                            alt="آذر یدک ریو" title="آذر یدک ریو"
                                                            class="img-responsive"/>
                                                    @endif
                                                    {{$p->name}}<br>
                                                    <span class="text-danger">{{$p->price}} تومان</span>
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
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
