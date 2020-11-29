@extends('front.layout.master')

@section('content')
    <h1 class="tvtitle">{{$video->title}}</h1>
    <div class="tv">
{{--        <video controls class="video">--}}
{{--            <source src="{{$video->link}}" type="video/youtube">--}}
{{--            Your browser does not support HTML video.--}}
{{--        </video>--}}
        <iframe src="{{$video->link}}" frameborder="0" class="video"></iframe>
    </div>
@endsection
