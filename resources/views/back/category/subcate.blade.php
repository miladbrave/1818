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
                                    <span class="fa fa-file"></span>
                                    افزودن دسته بندی جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('category.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                                <label><span class="text-danger">*</span>نام دسته بندی (زیر
                                                    دسته)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-file"></i></span>
                                                    <input type="text" class="form-control" name="title" required
                                                           value="{{old('title')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">زیر مجموعه</label>
                                                <select name="type" class="select2 form-control" data-placeholder="زیرمجموعه انتخاب کنید" >
                                                    @foreach($maincategories as $maincategory)
                                                        <option
                                                            value="{{$maincategory->id}}">{{$maincategory->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit">+ ثبت</button>
                                </form>
                            </div>

                        </div>
                        <div class="panel panel-default animated fadeInUp">
                            <div class="panel-body min-height-100">
                                <h1 class="page-title">
                                    <span class="fa fa-folder-open"></span>
                                    دسته بندی
                                    <hr>
                                </h1>
                                <div class="panel-body wt-panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-border table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">نام</th>
                                                <th class="text-center">والد</th>
                                                <th class="text-center">ابزار</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($subcategories as $subcategory)
                                                <tr>
                                                    <td class="text-center">{{$subcategory->title}}</td>
                                                        <td class="text-center">
                                                            @foreach($maincategories as $maincategory)
                                                            @if($subcategory->type == $maincategory->id)
                                                                {{ $maincategory->title }}
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                    <td class="text-center">
                                                        <form method="post"
                                                              action="{{route('category.destroy',$subcategory->id)}}"
                                                              style="display: inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-default btn-rounded btn-sm"
                                                                    type="submit"><i class="icon-eye"></i> حذف
                                                            </button>
                                                        </form>
                                                        <a href="{{route('category.edit',$subcategory->id)}}">
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
                                    {{ $subcategories->links() }}
                                </div>
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

