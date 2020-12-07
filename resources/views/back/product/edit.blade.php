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
                                    ویرایش محصول
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('product.update',$product->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('faname')) has-error @endif">
                                                <label><span class="text-danger">*</span>نام محصول (فارسی)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="faname" required
                                                           value="{{$product->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('laname')) has-error @endif">
                                                <label>نام محصول (لاتین)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="laname"
                                                           value="{{$product->lname}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('laname')) has-error @endif">
                                                <label>تعداد</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                                    <input type="number" class="form-control" name="count" required
                                                           value="{{$product->count}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">موجودیت</label>
                                                <select class="select2 form-control" name="exist">
                                                    <option value="1" @if($product->exist == 1) selected
                                                                @endif>موجود</option>
                                                    <option value="2" @if($product->exist == 2) selected
                                                                @endif>نا موجود</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <example-component :product="{{$product}}" :pro="{{$pro}}"></example-component>
                                    </div>
                                    <hr style="background-color: red;height: 1px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('price')) has-error @endif">
                                                <label><span class="text-danger">*</span>قیمت (ریال)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                    <input type="text" class="form-control" name="price" required
                                                           value="{{$product->price}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('price')) has-error @endif">
                                                <label>تخفیف (درصد)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                                    <input type="text" class="form-control" name="discount"
                                                           value="{{$product->discount}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">برند محصول</label>
                                                <select class="select2 form-control" name="brand">
                                                    @foreach($brands as $brand)
                                                        <option @if($product->brand_id == $brand->id) selected
                                                                @endif value="{{$brand->id}}">{{$brand->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">نوع</label>
                                                <select class="select2 form-control" name="type">
                                                    <option value="1" @if($product->type == 1) selected @endif>لوازم موتوری</option>
                                                    <option value="2" @if($product->type == 2) selected @endif>انتقال قدرت و گیربکس</option>
                                                    <option value="3" @if($product->type == 3) selected @endif>برقی و سنسورها</option>
                                                    <option value="4" @if($product->type == 4) selected @endif> روغن، فیلترها</option>
                                                    <option value="5" @if($product->type == 5) selected @endif>سیستم تعلیق وجلوبندی</option>
                                                    <option value="6" @if($product->type == 6) selected @endif> لوازم جانبی</option>
                                                    <option value="7" @if($product->type == 7) selected @endif>لوازم هیدرولیک فرمان</option>
                                                    <option value="8" @if($product->type == 8) selected @endif>لوازم سیستم ترمز</option>
                                                    <option value="9" @if($product->type == 9) selected @endif>تزئینات</option>
                                                    <option value="10" @if($product->type == 10) selected @endif>لوازم سیستم خنکاری </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding: 3% 3%">
                                                <label>توضیحات محصول</label>
                                                <textarea id="textareaDes" name="des"
                                                          class="editor form-control"> {{$product->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 up">
                                            <label>آپلود تصاویر محصول</label>
                                            <hr>
                                        </div>
                                        <div class="col-md-8 ">
                                            <div class="form-group">
                                                <label for="photo">تصویر</label>
                                                <input type="hidden" name="photo_id[]" id="product-photo">
                                                <div id="photo" class="dropzone"></div>
                                                <div class="row">
                                                    @foreach($photos as $photo)
                                                        <div class="col-sm-3" id="photo_{{$photo->id}}"
                                                             style="margin:2%;">
                                                            <img class="img-responsive" src="{{asset($photo->path)}}"
                                                                 alt="image">
                                                                <a href="{{route('photoDestroy',$photo->id)}}"
                                                                   class="pull-left small btn btn-danger"
                                                                        type="submit" style="margin-top: 2%">حذف
                                                                </a>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label style="margin-bottom: 7%">وضعیت نشر</label>
                                            <div class="clearfix">
                                                <div class="radio radio-inline radio-replace radio-success">
                                                    <input type="radio" name="distribute" id="radioInput2"
                                                           value="انتشار"
                                                           @if($product->distribute == 'انتشار') checked @endif>
                                                    <label for="radioInput2">انتشار</label>
                                                </div>
                                                <div class="radio radio-inline radio-replace radio-danger">
                                                    <input type="radio" name="distribute" id="radioInput2"
                                                           value="عدم انتشار"
                                                           @if($product->distribute == 'عدم انتشار') checked @endif>
                                                    <label for="radioInput2">عدم انتشار</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <h5 class="form-text text-muted text-danger"><span class="text-danger">*</span>
                                        اولین تصویر آپلود شده همان تصویر اولیه محصول می باشد.</h5>
                                    <hr>
                                    <button class="btn btn-success" type="submit"
                                            onclick="productGallery({{$product->photos->pluck('id')}})"
                                    >+ ثبت تغییرات
                                    </button>
                                </form>
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
        productGallery = function (photos) {
            if (photos) {
                document.getElementById('product-photo').value = photosGallery.concat(photos)
            } else {
                document.getElementById('product-photo').value = photosGallery
            }
        }
        CKEDITOR.replace('textareaDes', {
            customConfig: 'config.js',
            language: 'fa',
            removePlugins: 'cloudservices , easyimage'
        })
    </script>

@endsection
