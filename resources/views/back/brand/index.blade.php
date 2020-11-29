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
                                    <span class="fa fa-flag"></span>
                                    افزودن برند جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('brand.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('brand')) has-error @endif">
                                                <label><span class="text-danger">*</span>نام برند</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                    <input type="text" class="form-control" name="brand" required
                                                           value="{{old('brand')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit">+ ثبت </button>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default animated fadeInUp">
                            <div class="panel-body min-height-100">
                                <h1 class="page-title">
                                    <span class="fa fa-flag"></span>
                                    برند ها
                                    <hr>
                                </h1>
                                <div class="panel-body wt-panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-border table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">نام</th>
                                                <th class="text-center">ابزار</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($brands as $brand)
                                                <tr>
                                                    <td class="text-center">{{$brand->title}}</td>
                                                    <td class="text-center">
                                                        <form method="post"
                                                              action="{{route('brand.destroy',$brand->id)}}"
                                                              style="display: inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-default btn-rounded btn-sm"
                                                                    type="submit"><i class="icon-eye"></i> حذف
                                                            </button>
                                                        </form>
                                                        <a href="{{route('brand.edit',$brand->id)}}">
                                                            <button class="btn btn-default btn-rounded btn-sm"
                                                                    type="button"><i class="icon-trash"></i> ویرایش
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="container">
                                    {{ $brands->links() }}
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <footer class="animatedParent animateOnce z-index-10">
                <div class="footer-main animated fadeInUp slow">&copy; 2020 <strong><a target="_blank" href="i7v.ir">Logic</a></strong>
                    Admin Theme by <a target="_blank" href="i7v.ir">Logic</a></div>
            </footer>
        </div>
    </div>
@endsection

