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
                                    <span class="fa fa-gear"></span>
                                    افزودن ویژگی جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('attributeValue.index')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                                <label><span class="text-danger">*</span>نام ویژگی</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                    <input type="text" class="form-control" name="title" required
                                                           value="{{old('title')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">این ویژگی مرتبط است:</label>
                                                <select name="attribute_id" class="select2 form-control">
                                                    <option value="null">لطفا ویژگی را انتخاب کنید</option>
                                                    @foreach($attributes as $attribute)
                                                        <option
                                                            value="{{$attribute->id}}">{{$attribute->title}}</option>
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
                                    <span class="icon-users"></span>
                                    دسته بندی
                                    <hr>
                                </h1>
                                <div class="panel-body wt-panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-border table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">مقدار</th>
                                                <th class="text-center">ویژگی</th>
                                                <th class="text-center">ابزار</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($attributevalues as $attributevalue)
                                                <tr>
                                                    <td class="text-center">{{$attributevalue->title}}</td>
                                                    <td class="text-center">
                                                        {{ $attributevalue->attribute->title }}
                                                    </td>
                                                    <td class="text-center">
                                                        <form method="post"
                                                              action="{{route('attributeValue.destroy',$attributevalue->id)}}"
                                                              style="display: inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-default btn-rounded btn-sm"
                                                                    type="submit"><i class="icon-trash"></i> حذف
                                                            </button>
                                                        </form>
                                                        <a href="{{route('attributeValue.edit',$attributevalue->id)}}">
                                                            <button class="btn btn-default btn-rounded btn-sm"
                                                                    type="button"><i class="icon-eye"></i> ویرایش
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="container">
                                    {{ $attributevalues->links() }}
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

