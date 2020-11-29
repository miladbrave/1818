<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\front\HomeController;
use App\Product;
use App\Purchlist;
use App\User;
use App\Userlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class factorController extends Controller
{

    public function index()
    {
        $userlists = Userlist::latest('created_at')->paginate(10);
        foreach ($userlists->pluck('id') as $userlist) {
            $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
        }
        if (!isset($purchlist)) {
            $purchlist = null;
        }

        $purchl = Product::with('photos')->get();
        return view('back.factors.index', compact('userlists', 'purchlist', 'purchl'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $userlist = Userlist::where('factor', $id)->first();
        $userlist->shenase = $request->shenase;
        $userlist->receive = $request->delivery;
        $userlist->save();

        $user = User::findOrFail($userlist->user_id);
        Mail::send('back.factors.shenase',
            [
                'user' => $user,
                'deliver' => $request->delivery,
                'userlist' => $userlist,
                'shenase' => $request->shenase,
            ], function ($m) use ($user) {
                $m->from('info@1818kala.ir', 'آذر یدک ریو');
                $m->to($user->email, $user->name)->subject('شماره مرسوله خریداری شده');
            });

        return back();
    }

    public function destroy($id)
    {
        //
    }
}
