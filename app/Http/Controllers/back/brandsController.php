<?php

namespace App\Http\Controllers\back;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class brandsController extends Controller
{

    public function index()
    {
        $brands = Brand::paginate(10);
        return view('back.brand.index',compact('brands'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->title = $request->brand;
        $brand->save();
        return back();
    }

    public function show(Brand $brand)
    {
        //
    }


    public function edit(Brand $brand)
    {
        return view('back.brand.edit',compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->title = $request->brand;
        $brand->save();
        return redirect()->route('brand.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back();
    }
}
