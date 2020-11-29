<?php

namespace App\Http\Controllers\back;

use App\Attribute;
use App\Attributevalue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class attributeValueController extends Controller
{

    public function index()
    {
        $attributes = Attribute::all();
        $attributevalues = Attributevalue::with('attribute')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('back.attribute.attributevalueindex', compact('attributes', 'attributevalues'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $attributevalue = new Attributevalue();
        $attributevalue->title = $request->title;
        $attributevalue->attribute_id = $request->attribute_id;
        $attributevalue->save();
        return back();
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $attributes = Attribute::all();
        $attributevalues = Attributevalue::with('attribute')->where('id',$id)->first();
        $attributevalue = Attributevalue::find($id)->attribute()->first();
        return view('back.attribute.attributevalueedit', compact('attributes', 'attributevalues','attributevalue'));

    }


    public function update(Request $request, $id)
    {
        $attributevalue = Attributevalue::findOrFail($id);
        $attributevalue->title = $request->title;
        $attributevalue->attribute_id = $request->attribute_id;
        $attributevalue->save();
        return redirect()->route('attributeValue.index');
    }


    public function destroy($id)
    {
        $attributeValue = Attributevalue::findOrFail($id);
        $attributeValue->delete();
        return back();
    }
}
