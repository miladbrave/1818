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
                                    <span class="fa fa-info-circle"></span>
                                    ویرایش بلاگ
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right mob"
                                       type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('blog.update',$blog->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group @if($errors->has('link')) has-error @endif">
                                                <label>متن مطالب خودرویی</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control" name="title"
                                                           value="{{$blog->title}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label style="margin-bottom: 7%">وضعیت نشر</label>
                                            <div class="clearfix">
                                                <div class="radio radio-inline radio-replace radio-success">
                                                    <input type="radio" name="distribute" id="radioInput2" checked
                                                           value="انتشار"
                                                           @if($blog->distribute == "انتشار") checked @endif>
                                                    <label for="radioInput2">انتشار</label>
                                                </div>
                                                <div class="radio radio-inline radio-replace radio-danger">
                                                    <input type="radio" name="distribute" id="radioInput2"
                                                           value="عدم انتشار"
                                                           @if($blog->distribute == "عدم انتشار") checked @endif>
                                                    <label for="radioInput2">عدم انتشار</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding: 3% 3%">
                                                <label>توضیحات</label>
                                                <textarea id="textareaDes" name="des"
                                                          class="editor form-control">{!! $blog->description !!} </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">تصویر</label>
                                                <input type="hidden" name="photo_id[]" id="product-photo">
                                                <div id="photo" class="dropzone"></div>
                                            </div>
                                            @if($blog->photo()->first())
                                                <div class="col-sm-3" id="photo_{{$blog->photo()->first()->id}}"
                                                     style="margin:2%;">
                                                    <img class="img-responsive"
                                                         src="{{asset($blog->photo()->first()->path)}}"
                                                         alt="image">
                                                    <a href="{{route('photoDestroy',$blog->photo()->first()->id)}}"
                                                       class="pull-left small btn btn-danger"
                                                       type="submit" style="margin-top: 2%">حذف
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="file">فایل دانلودی</label>
                                                <input type="hidden" name="files[]" id="blog-file">
                                                <div id="file" class="dropzone"></div>
                                            </div>
                                            @if(isset($photos))
                                                @foreach($photos as $photo)
                                                    <div class="col-sm-3" id="photo_{{$photo->id}}"
                                                         style="margin:2%;">
                                                        <img class="img-responsive"
                                                             src="{{asset($photo->path)}}"
                                                             alt="image">
                                                        <a href="{{route('photoDestroy',$photo->id)}}"
                                                           class="pull-left small btn btn-danger"
                                                           type="submit" style="margin-top: 2%">حذف
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit" onclick="productGallery()">+ ثبت
                                        بلاگ
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
        var photosGallery = []
        var photosGallery2 = []
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
        ///////////////////////////////////////////////////////////////
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
            document.getElementById('product-photo').value = photosGallery;
            document.getElementById('blog-file').value = photosGallery2;
        }
        CKEDITOR.replace('textareaDes', {
            customConfig: 'config.js',
            language: 'fa',
            removePlugins: 'cloudservices , easyimage'
        })
    </script>

@endsection
