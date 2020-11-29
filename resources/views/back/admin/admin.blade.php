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
                                لیست مدیران
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">نام</th>
                                            <th class="text-center">نام خانوادگی</th>
                                            <th class="text-center">ایمیل</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td class="text-center">{{$admin->fname}}</td>
                                                <td class="text-center">{{$admin->lname}}</td>
                                                <td class="text-center">{{$admin->email}}</td>
                                                <td class="text-center">
                                                    <form method="post" action="{{route('admin.destroy',$admin->id)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm" type="submit"><i class="icon-eye"></i> حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
