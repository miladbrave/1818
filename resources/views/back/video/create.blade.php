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
                                    <span class="fa fa-picture-o"></span>
                                    افزودن ویدیو جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('link')) has-error @endif">
                                                <label><span class="text-danger">*</span>لینک ویدیو</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                    <input type="text" class="form-control" name="link" required
                                                           value="{{old('link')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group @if($errors->has('link')) has-error @endif">
                                                <label><span class="text-danger">*</span>متن ویدیو</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control" name="title" required
                                                           value="{{old('title')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-sm-9 control-label">محل قرار گیری</label>
                                                <select class="select2 form-control" name="type">
                                                    <option value="1">چپ</option>
                                                    <option value="2">راست</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="photo">تصویر</label>
                                                <input type="hidden" name="photo_id" id="blog-photo">
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
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit" onclick="productGallery()">+ ثبت
                                        ویدیو
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
        var photosGallery = [];
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
        productGallery = function () {
            document.getElementById('blog-photo').value = photosGallery;
        }
    </script>

@endsection
