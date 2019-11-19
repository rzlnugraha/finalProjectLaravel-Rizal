<?php

namespace App\Http\Controllers;

use App\Apply;
use Illuminate\Http\Request;
use Sentinel, Alert;
use App\User;

class ApplyController extends Controller
{
    public function store(Request $request)
    {
        $data = User::where('id',Sentinel::getUser()->id)->first()->biodata()->first()->cv;
        if ($data == null) {
            Alert::error('CV Harus diisi','Error');
            return back();
        } else {
            $apply = new Apply();
            $apply->user_id = Sentinel::getUser()->id;
            $apply->job_id = $request->job_id;
            $apply->save();
            Alert::success('Berhasil meng apply','Success');
            return back();
        }
    }
}
