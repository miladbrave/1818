<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Video;
use Illuminate\Http\Request;

class videoController extends Controller
{

    public function index()
    {
        $videos = Video::all();
        return view('back.video.index',compact('videos'));
    }

    public function create()
    {
        return view('back.video.create');
    }

    public function store(Request $request)
    {
        $video = new Video();
        $video->link = $request->link;
        $video->title = $request->title;
        $video->number = $request->type;
        $video->status = $request->distribute;
        $video->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        $photos->video_id = $video->id;
        $photos->save();

        return redirect()->route('video.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('back.video.edit',compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->link = $request->link;
        $video->title = $request->title;
        $video->number = $request->type;
        $video->status = $request->distribute;
        $video->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos){
            $photos->video_id = $video->id;
            $photos->save();
        }

        return redirect()->route('video.index');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $photos = Photo::where('video_id', $video->id)->get();
        if ($photos) {
            foreach ($photos as $photo) {
                unlink(getcwd() . $photo->path);
                $photo->delete();
            }
        }
        $video->delete();
        return back();
    }
}
