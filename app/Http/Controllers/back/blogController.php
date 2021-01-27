<?php

namespace App\Http\Controllers\back;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class blogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('photo')->get();
        return view('back.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('back.blog.create');
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->link = $request->link;
        $blog->title = $request->title;
        $blog->status = $request->distribute;
        $blog->description = $request->des;
        $blog->status = $request->distribute;
        $blog->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->blog_id = $blog->id;
            $photos->save();
        }

        $photos = explode(',', $request->input('files')[0]);
        foreach ($photos as $photo) {
            $test = Photo::find($photo);
            $test->blog_file = $blog->id;
            $test->save();
        }

        return redirect()->route('blog.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $blog = Blog::with('photo')->findOrFail($id);
        $photos = Photo::where('blog_file', $blog->id)->get();
        return view('back.blog.edit', compact('blog', 'photos'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->link = $request->link;
        $blog->title = $request->title;
        $blog->status = $request->distribute;
        $blog->description = $request->des;
        $blog->status = $request->distribute;
        $blog->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->blog_id = $blog->id;
            $photos->save();
        }

        if (!is_null($request->get('files')[0])) {
            $photos = explode(',', $request->input('files')[0]);
            foreach ($photos as $photo) {
                $test = Photo::find($photo);
                $test->blog_file = $blog->id;
                $test->save();
            }

        }

        return redirect()->route('blog.index');
    }

    public
    function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $photos = Photo::where('blog_id', $id)->get();
        if ($photos) {
            foreach ($photos as $photo) {
                unlink(getcwd() . $photo->path);
                $photo->delete();
            }
        }
        $blog->delete();
        return redirect()->route('blog.index');
    }

    public
    function fileStore(Request $request)
    {
        $uploadfile = $request->file('file');
        $filename = time() . $uploadfile->getClientOriginalName();
        $original_name = $uploadfile->getClientOriginalName();
        $uploadfile->move('photo', $filename);
        $photo = new Photo();
        $photo->original_name = $original_name;
        $photo->path = $filename;
        $photo->user_id = auth()->user()->id;
        $photo->save();

        return response()->json([
            'blogPhoto_id' => $photo->id
        ]);
    }

}
