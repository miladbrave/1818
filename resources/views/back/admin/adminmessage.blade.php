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
                                    <span class="fa fa-envelope"></span>
                                    افزودن پیام جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('messages.send.main')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                                <label><span class="text-danger">*</span>تیتر پیام</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="title" required
                                                           value="{{old('title')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                                <label><span class="text-danger">*</span>متن پیام</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="description" required
                                                           value="{{old('description')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit" onclick="productGallery()">ارسال پیام
                                    </button>
                                </form>
                            </div>
                            <div class="panel-body min-height-100">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">نام</th>
                                            <th class="text-center">متن</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($messages as $message)
                                            <tr>
                                                <td class="text-center">{{$message->name}}</td>
                                                <td class="text-center">{!! Str::limit($message->description,70) !!}</td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('message.destroy', $message->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                    <a href="{{route('message.edit',$message->id)}}"
                                                       class="btn btn-default btn-rounded btn-sm"
                                                       type="submit"><i class="icon-trash"></i> ویرایش
                                                    </a>
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

            <footer class="animatedParent animateOnce z-index-10">
                <div class="footer-main animated fadeInUp slow">&copy; 2020 <strong><a target="_blank"
                                                                                       href="i7v.ir">Logic</a></strong>
                    Admin Theme by <a target="_blank" href="i7v.ir">Logic</a></div>
            </footer>
        </div>
    </div>
@endsection
