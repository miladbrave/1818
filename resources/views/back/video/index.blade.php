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
                                <span class="fa fa-picture-o"></span>
                                لیست ویدیو
                                <a href="{{route('video.create')}}" class="btn btn-default btn-rounded pull-right"
                                   type="button">ویدیو جدید</a>
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">تصویر</th>
                                            <th class="text-center">موضوع</th>
                                            <th class="text-center">لینک</th>
                                            <th class="text-center">محل قرار گیری</th>
                                            <th class="text-center">وضعیت</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($videos as $video)
                                            <tr>
                                                <td class="text-right" width="10%">
                                                    @if(isset($video->photo->path))
                                                        <img src="{{$video->photo->path}}" alt="">
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$video->title}}</td>
                                                <td class="text-center">{{Str::limit($video->link,20)}}</td>
                                                <td class="text-center">
                                                    @if($video->number == "1")
                                                        <span>چپ</span>
                                                    @else
                                                        <span>راست</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$video->status}}</td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('video.destroy',$video->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-eye"></i> حذف
                                                        </button>
                                                    </form>
                                                    <a href="{{route('video.edit',$video->id)}}">
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="button"><i class="icon-trash"></i> ویرایش
                                                        </button>
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
        </div>
    </div>
@endsection
