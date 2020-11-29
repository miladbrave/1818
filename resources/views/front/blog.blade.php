@extends('front.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
                @if($blog->status == "انتشار")
                    <div class="col-md-12 card" style="padding: 1%;margin-top: 5%">
                        <div class="card-body col-md-3 col-sm-12 col-xs-12 pull-right" style="padding: 1%;">
                            @if(isset($blog->photo()->first()->path))
                                <img src="{{asset($blog->photo()->first()->path)}}" alt="" width="80%">
                            @endif
                        </div>
                        <div class="card-body col-md-9 col-sm-12 col-xs-12">
                            <div class="text-center">
                                <div class="text-right">
                                    <h3 class="text-danger">{{$blog->title}}</h3>
                                </div>
                                <div class="text-right">
                                    <p class="card-text">
                                        {!! $blog->description !!}
                                    </p>
                                </div>
                                <div>
                                    @foreach($blogPhotos as $blogPhoto)
                                        @if($blogPhoto['blog_file'] == $blog->id)
                                            <a class="btn btn-success pull-left" href="{{route('download',$blog->id)}}">دانلود</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
