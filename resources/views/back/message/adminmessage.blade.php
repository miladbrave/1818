@extends('back.layout.master')

@section('content')
    @include('back.layout.sidebar')
    <div class="main-container gray-bg" id="app">
        <div class="main-content">
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 animatedParent animateOnce z-index-46">
                        <div class="panel panel-default animated fadeInUp">
                            <div class="panel-body min-height-100">
                                <h1 class="page-title">
                                    <span class="fa fa-pencil"></span>
                                    ارسال پیام
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('message.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                                <label><span class="text-danger">*</span>متن پیام</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                                    <input type="text" class="form-control" name="description" required
                                                           value="{{old('description')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group @if($errors->has('user')) has-error @endif">
                                                <label>کاربر</label>
                                                <div class="input-group">
                                                    <select class="select form-control" name="user">
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit" onclick="productGallery()">
                                        ارسال پیام
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 animatedParent animateOnce z-index-46">
                <div class="panel panel-default animated fadeInUp">
                    <div class="panel-body min-height-100">
                        <h1 class="page-title">
                            <span class="fa fa-envelope"></span>
                            لیست پیام های عمومی
                            <hr>
                        </h1>
                        <div class="panel-body wt-panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-border table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">کاربر</th>
                                        <th class="text-center">نام</th>
                                        <th class="text-center">ایمیل</th>
                                        <th class="text-center">متن</th>
                                        <th class="text-center">ابزار</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td class="text-center">{{$message->user()->first()['fname'] . $message->user()->first()['lname']}}</td>
                                            <td class="text-center">{{$message->name}}</td>
                                            <td class="text-center">{{$message->email}}</td>
                                            <td class="text-center">{!! Str::limit($message->description,20) !!}</td>
                                            <td class="text-center">

                                                <button class="btn btn-default btn-rounded btn-sm"
                                                        data-toggle="modal" data-target="#{{$message['id']}}"
                                                        type="button"><i class="fa fa-envelope"></i> نمایش
                                                </button>
                                                <form method="post"
                                                      action="{{route('message.destroy',['message'=> $message->id])}}"
                                                      style="display: inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-default btn-rounded btn-sm"
                                                            type="submit"><i class="icon-trash"></i> حذف
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($messages as $message)
                <div class="modal fade" id="{{$message['id']}}" tabindex="-1" role="dialog" aria-labelledby="{{$message['id']}}"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="{{$message['id']}}">{{$message->name}}</h5>
                            </div>
                            <div class="modal-body">
                                {{$message->description}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">بستن</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <footer class="animatedParent animateOnce z-index-10">
                <div class="footer-main animated fadeInUp slow">&copy; 2020 <strong><a target="_blank"
                                                                                       href="i7v.ir">Logic</a></strong>
                    Admin Theme by <a target="_blank" href="i7v.ir">Logic</a></div>
            </footer>
        </div>
    </div>
@endsection
