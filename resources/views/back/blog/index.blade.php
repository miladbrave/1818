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
                                <span class="fa fa-info-circle"></span>
                                لیست مطالب
                                <a href="{{route('blog.create')}}" class="btn btn-default btn-rounded pull-right"
                                   type="button">+ مطلب جدید </a>
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover" id="table_id">
                                        <thead>
                                        <tr>
                                            <th class="text-center">تصویر</th>
                                            <th class="text-center">عنوان مطلب</th>
                                            <th class="text-center">توضیحات</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td class="text-center" width="25%">
                                                    @if($blog->photo()->first())
                                                        <img class="img-responsive"  width="60%" height="70px"
                                                             src="{{asset($blog->photo()->first()->path)}}">
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$blog->title}}</td>
                                                <td class="text-center">{!!Str::limit( $blog->description ,20)!!}</td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('blog.destroy',$blog->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-eye"></i> حذف
                                                        </button>
                                                    </form>
                                                    <a href="{{route('blog.edit',$blog->id)}}">
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
{{--                                <div class="container">--}}
{{--                                    {{ $blogs->links() }}--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection
