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
                                لیست کاربران
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
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{$user->fname}}</td>
                                                <td class="text-center">{{$user->lname}}</td>
                                                <td class="text-center">{{$user->email}}</td>
                                                <td class="text-center">
                                                    <form method="post"
                                                          action="{{route('admin.destroy',$user->email)}}"
                                                          style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default btn-rounded btn-sm"
                                                                type="submit"><i class="icon-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                    @if($user->admin == 'user')
                                                        <a href="{{route('admin.edit',['admin' => $user->id])}}">
                                                            <button class="btn btn-default btn-rounded btn-sm"
                                                                    type="button"><i class="fa fa-gear"></i>ادمین
                                                            </button>
                                                        </a>
                                                    @elseif($user->admin == 'admin')
                                                        <span class="badge badge-pill badge-danger" style="margin-right: 2%">Admin</span>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="container">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
