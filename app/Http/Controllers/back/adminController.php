<?php

namespace App\Http\Controllers\back;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index()
    {
        $admins = User::where('admin', 'admin')->get();
        return view('back.admin.admin', compact('admins'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($user)
    {
        $users = User::paginate(20);
        return view('back.admin.user', compact('users'));
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        $user->admin = "admin";
        $user->save();
        return back();
    }

    public function update(Request $request, $user)
    {

    }

    public function destroy($id)
    {
        $user = User::where('email', $id)->first();
        if ($user->admin == "user") {
            $user->delete();
        }

        if ($user->admin == "admin") {
            $user->admin = "user";
            $user->save();
        }

        return back();
    }
}
