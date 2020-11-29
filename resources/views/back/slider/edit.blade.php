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
                                    <span class="fa fa-tv"></span>
                                    ویرایش اسلایدر
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('link')) has-error @endif">
                                                <label>لینک اسلایدر</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="link"
                                                           value="{{$slider->link}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 ">
                                            <div class="form-group">
                                                <label for="photo">تصویر</label>
                                                <input type="hidden" name="photo_id[]" id="product-photo">
                                                <div id="photo" class="dropzone"></div>
                                            </div>
                                            <div class="row">
                                                @if($slider->photo()->first())
                                                    <div class="col-sm-3" id="photo_{{$slider->photo()->first()->id}}"
                                                         style="margin:2%;">
                                                        <img class="img-responsive"
                                                             src="{{asset($slider->photo()->first()->path)}}"
                                                             alt="image">
                                                        <a href="{{route('photoDestroy',$slider->photo()->first()->id)}}"
                                                           class="pull-left small btn btn-danger"
                                                           type="submit" style="margin-top: 2%">حذف
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label style="margin-bottom: 7%">وضعیت نشر</label>
                                            <div class="clearfix">
                                                <div class="radio radio-inline radio-replace radio-success">
                                                    <input type="radio" name="distribute" id="radioInput2"
                                                           value="انتشار"
                                                           @if($slider->distribute == 'انتشار') checked @endif>
                                                    <label for="radioInput2">انتشار</label>
                                                </div>
                                                <div class="radio radio-inline radio-replace radio-danger">
                                                    <input type="radio" name="distribute" id="radioInput2"
                                                           value="عدم انتشار"
                                                           @if($slider->distribute == 'عدم انتشار') checked @endif>
                                                    <label for="radioInput2">عدم انتشار</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 5%">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">شماره اسلایدر</label>
                                                <select class="select2 form-control" name="type">
                                                    <option value="0" @if($slider->number == "0" ) selected @endif>
                                                        ویژه
                                                    </option>
                                                    <option value="1" @if($slider->number == "1" ) selected @endif>1
                                                    </option>
                                                    <option value="2" @if($slider->number == "2" ) selected @endif>2
                                                    </option>
                                                    <option value="3" @if($slider->number == "3" ) selected @endif>3
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit"
                                            onclick="productGallery()"
                                    >+ ثبت تغییرات
                                    </button>
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
    <script type="text/javascript" src="{{asset('/back/js/plugins/dropzone/dropzone.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        var photosGallery = []
        var drop = new Dropzone('#photo', {
            maxFiles: 1,
            addRemoveLinks: true,
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
    </script>

@endsection
