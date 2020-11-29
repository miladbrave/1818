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
                                        @foreach($messages->where('type','get') as $message)
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

@endsection
