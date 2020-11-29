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
                                    <span class="fa fa-info"></span>
                                    افزودن مطلب جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group @if($errors->has('link')) has-error @endif">
                                                <label>متن مطالب خودرویی</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control" name="title"
                                                           value="{{old('title')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding: 3% 3%">
                                                <label for="textareaDes">توضیحات</label>
                                                <textarea id="textareaDes" name="des"
                                                          class="editor form-control"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">تصویر</label>
                                                <input type="hidden" name="photo_id" id="blog-photo">
                                                <div id="photo" class="dropzone"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="file">فایل دانلودی</label>
                                                <input type="hidden" name="files[]" id="blog-file">
                                                <div id="file" class="dropzone"></div>
                                            </div>
                                            <small class="text-danger">همه فایل ها در یک فایل به صورت زیپ قرار دهید.</small>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit" onclick="productGallery()">+ ثبت
                                        مقاله
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
    <script type="text/javascript" src="{{asset('/back/js/plugins/ckeditor/ckeditor.js')}}"></script>

    <script>
        Dropzone.autoDiscover = false;
        var photosGallery = [];
        var photosGallery2 = [];
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

        ///////////////////////////////////////////////////////////////////////////
        var drop2 = new Dropzone('#file', {
            maxFiles: 5,
            addRemoveLinks: true,
            url: "{{route('blogFile')}}",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                photosGallery2.push(response.blogPhoto_id)
            }
        });
        productGallery = function () {
            document.getElementById('blog-photo').value = photosGallery;
            document.getElementById('blog-file').value = photosGallery2;
        }

        CKEDITOR.replace('textareaDes', {
            customConfig: 'config.js',
            language: 'fa',
            removePlugins: 'cloudservices , easyimage'
        })
    </script>

@endsection
