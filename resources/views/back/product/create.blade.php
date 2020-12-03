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
                                    <span class="fa fa-cart-plus"></span>
                                    افزودن محصول جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('faname')) has-error @endif">
                                                <label><span class="text-danger">*</span>نام محصول (فارسی)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="faname" required
                                                           value="{{old('faname')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('laname')) has-error @endif">
                                                <label>نام محصول (لاتین)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="laname"
                                                           value="{{old('laname')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('laname')) has-error @endif">
                                                <label>تعداد</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                                    <input type="number" class="form-control" name="count" required
                                                           value="{{old('coiunt')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">موجودیت</label>
                                                <select class="select2 form-control" name="exist">
                                                    <option value="1">موجود</option>
                                                    <option value="2">نا موجود</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <example-component></example-component>
                                    </div>
                                    <hr style="background-color: red;height: 1px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('price')) has-error @endif">
                                                <label><span class="text-danger">*</span>قیمت (ریال)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                    <input type="text" class="form-control" name="price" required
                                                           value="{{old('price')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('price')) has-error @endif">
                                                <label>تخفیف (درصد)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                                    <input type="text" class="form-control" name="discount" required
                                                           value="{{old('price')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">برند محصول</label>
                                                <select class="select2 form-control" name="brand">
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">نوع</label>
                                                <select class="select2 form-control" name="type">
                                                    <option value="1">لوازم موتوری</option>
                                                    <option value="2">انتقال قدرت و گیربکس</option>
                                                    <option value="3">برقی و سنسورها</option>
                                                    <option value="4"> روغن، فیلترها</option>
                                                    <option value="5">سیستم تعلیق وجلوبندی</option>
                                                    <option value="6"> لوازم جانبی</option>
                                                    <option value="10"> لوازم سیستم خنکاری </option>
                                                    <option value="7">لوازم هیدرولیک فرمان</option>
                                                    <option value="8">لوازم سیستم ترمز</option>
                                                    <option value="9">تزئینات</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding: 3% 3%">
                                                <label>توضیحات محصول</label>
                                                <textarea id="textareaDes" name="des" required
                                                          class="editor form-control"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 up">
                                            <label>آپلود تصاویر محصول</label>
                                            <hr>
                                        </div>
{{--                                        <div class="col-md-4 ">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>آپلود تصویر اصلی</label>--}}
{{--                                                <div class="col-md-12 up2">--}}
{{--                                                    <input type="file" id="field-file" name="firstphoto" class="form-control field-file" enctype="multipart/form-data">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-md-8 ">
                                            <div class="form-group">
                                                <label for="photo">تصویر</label>
                                                <input type="hidden" name="photo_id[]" id="product-photo">
                                                <div id="photo" class="dropzone"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label style="margin-bottom: 7%">وضعیت نشر</label>
                                            <div class="clearfix">
                                                <div class="radio radio-inline radio-replace radio-success">
                                                    <input type="radio" name="distribute" id="radioInput2" checked
                                                           value="انتشار">
                                                    <label for="radioInput2">انتشار</label>
                                                </div>
                                                <div class="radio radio-inline radio-replace radio-danger">
                                                    <input type="radio" name="distribute" id="radioInput2"
                                                           value="عدم انتشار">
                                                    <label for="radioInput2">عدم انتشار</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <h5 class="form-text text-muted text-danger"><span class="text-danger">*</span>
                                        اولین تصویر آپلود شده همان تصویر اولیه محصول می باشد.</h5>
                                    <hr>
                                    <button class="btn btn-success" type="submit" onclick="productGallery()">+ ثبت محصول</button>
                                </form>
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
@section('script')
    <script type="text/javascript" src="{{asset('/back/js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('/back/js/plugins/dropzone/dropzone.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        var photosGallery = []
        var drop = new Dropzone('#photo', {
            addRemoveLinks: true,
            // autoProcessQueue : false,
        url: "{{route('productPhoto')}}",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                photosGallery.push(response.photo_id)
            }
        });
        productGallery = function () {
            document.getElementById('product-photo').value = photosGallery
        }
        CKEDITOR.replace('textareaDes', {
            customConfig: 'config.js',
            language: 'fa',
            removePlugins: 'cloudservices , easyimage'
        })
    </script>

@endsection
