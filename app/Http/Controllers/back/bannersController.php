<?php

namespace App\Http\Controllers\back;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class bannersController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('back.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('back.banner.create');
    }

    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->link = $request->link;
        $banner->title = $request->title;
        $banner->distribute = $request->distribute;
        $banner->number = $request->type;
        $banner->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->banner_id = $banner->id;
            $photos->save();
        }

        return redirect()->route('banner.index');
    }

    public function show(Banner $banner)
    {
        //
    }

    public function edit(Banner $banner)
    {
        return view('back.banner.edit', compact('banner'));
    }


    public function update(Request $request, Banner $banner)
    {
        $banner->link = $request->link;
        $banner->title = $request->title;
        $banner->distribute = $request->distribute;
        $banner->number = $request->type;
        $banner->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->banner_id = $banner->id;
            $photos->save();
        }

        return redirect()->route('banner.index');
    }


    public function destroy(Banner $banner)
    {
        $photos = Photo::where('banner_id', $banner->id)->get();
        if ($photos) {
            foreach ($photos as $photo) {
                unlink(getcwd() . $photo->path);
                $photo->delete();
            }
        }
        $banner->delete();
        return redirect()->route('banner.index');
    }
}
