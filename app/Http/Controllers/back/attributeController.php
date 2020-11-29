<?php

namespace App\Http\Controllers\back;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class attributeController extends Controller
{

    public function index()
    {
        $attributes = Attribute::orderBy('created_at', 'desc')->paginate(10);
        $maincategories = Category::where('type', '!=', 'null')->get();
        return view('back.attribute.attributeindex', compact('maincategories', 'attributes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attribute = new Attribute();
        $attribute->title = $request->title;
        $attribute->save();
        $test =$request->get('type');
        $attribute->categories()->sync($test);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $maincategories = Category::where('type', '!=', 'null')->get();
        $attributes = Attribute::where('id',$id)->first();
        $attributecategories = Attribute::find($id)->categories()->get();
        return view('back.attribute.attributeedit', compact('maincategories', 'attributes','attributecategories'));
    }

    public function update(Request $request, $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->title = $request->title;
        $attribute->save();
        $test = $request->get('type');
        $attribute->categories()->sync($test);
        return redirect()->route('attribute.index');
    }

    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return back();
    }
}
