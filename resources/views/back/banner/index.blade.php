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
                                <span class="icon-users"></span>
                                لیست بنر ها
                                <a href="{{route('banner.create')}}" class="btn btn-default btn-rounded pull-right"
                                   type="button">+ بنر جدید </a>
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">تصویر</th>
                                            <th class="text-center">شماره اسلایدر</th>
                                            <th class="text-center">لینک</th>
                                            <th class="text-center">متن</th>
                                            <th class="text-center">وضعیت</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td class="text-center" width="25%">
                                                    @if($banner->photo()->first())
                                                    <img class="img-responsive"  width="60%" height="70px"
                                                         src="{{asset($banner->photo()->first()->path)}}">
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$banner->number}}</td>
                                                <td class="text-center">{{Str::limit($banner->link,20)}}</td>
                                                <td class="text-center">{{Str::limit($banner->title,20)}}</td>
                                                <td class="text-center">{{$banner->distribute}}</td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('banner.destroy',$banner->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-eye"></i> حذف
                                                        </button>
                                                    </form>
                                                    <a href="{{route('banner.edit',$banner->id)}}">
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
