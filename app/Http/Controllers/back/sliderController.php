<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Slider;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $photos = Photo::where('slider_id', '!=', 'null')->get();
        return view('back.slider.index', compact('sliders', 'photos'));
    }

    public function create()
    {
        return view('back.slider.create');
    }


    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->link = $request->link;
        $slider->distribute = $request->distribute;
        $slider->number = $request->type;
        $slider->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        $photos->slider_id = $slider->id;
        $photos->save();

        return redirect()->route('slider.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('back.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->link = $request->link;
        $slider->distribute = $request->distribute;
        $slider->number = $request->type;
        $slider->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos){
        $photos->slider_id = $slider->id;
        $photos->save();}

        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $photos = Photo::where('slider_id', $slider->id)->get();
        if ($photos) {
            foreach ($photos as $photo) {
                unlink(getcwd() . $photo->path);
                $photo->delete();
            }
        }
        $slider->delete();
        return redirect()->route('slider.index');
    }


}
