<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Message;
use App\Purchlist;
use App\User;
use App\Userlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class dashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $admin = $users->where('id',auth()->user()->id)->first();
        $totalrecive = Userlist::where('status','success')->get();
        foreach ($totalrecive->pluck('id') as $userlist) {
            $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get()->sum('count');
        }
        if (!isset($purchlist)) {
            $purchlist = null;
        }
        $count= array_sum($purchlist);

        return view('back.index',compact('users','totalrecive','admin','count'));
    }

    public function sendmain(Request $request)
    {
        $message = new Message();
        $message->description = $request->description;
        $message->user_id = $request->user;
        $message->email = "admin";
        $message->name = $request->title;
        $message->type = "public";
        $message->save();
        return back();
    }

    public function mainmessage()
    {
        return view('back.admin.adminmessage');
    }

    public function chartApi()
    {
        $months = Userlist::where('status','success')->get(['totalprice','created_at'])->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('m');
        });
        foreach ($months as $m){
            $test[] = $m->sum('totalprice');
        }
        $response = [
            "price" => $test,
        ];
        return response()->json($response,200);
    }

}
