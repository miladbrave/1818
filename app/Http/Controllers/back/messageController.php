<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class messageController extends Controller
{

    public function index()
    {
        $messages = Message::with('user')->get();
        return view('back/message/messagepublic',compact('messages'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $message = new Message();
        $message->description = $request->description;
        $message->user_id = $request->user;
        $message->email = "admin";
        $message->name = "admin";
        $message->type = "send";
        $message->save();
        return back();
    }

    public function show($id)
    {
        $messages = Message::where('type','send')->get();
        $users = User::all();
        return view('back.message.adminmessage',compact('users','messages'));
    }

    public function edit($id)
    {
        $message = Message::find($id);
        return view('back.admin.adminmessageedit',compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->description = $request->description;
        $message->email = "admin";
        $message->name = $request->title;
        $message->type = "public";
        $message->save();
        return redirect()->route('mainmessage');
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return back();
    }
}
