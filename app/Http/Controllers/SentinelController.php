<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use App\Biodata;
use App\Http\Requests\RegisterRequest;
use Sentinel;

class SentinelController extends Controller
{
    public function signup()
    {
        return view('auth.register');
    }

    public function signup_store(RegisterRequest $req)
    {
        DB::beginTransaction();
        try {
            $role = Sentinel::findRoleBySlug('visitor');
            $role_id = $role->id;
            $credentials = [
                'first_name' => $req->first_name,
                'last_name' => $req->last_name,
                'email' => $req->email,
                'password' => $req->password,
            ];
            $user = Sentinel::registerAndActivate($credentials);
            $user->save();
            $id = $user->id;
            $tgl_lahir = $req->tgl_lahir;
            $biodata = new Biodata();
            $biodata->user_id = $id;
            $biodata->tgl_lahir = $tgl_lahir;
            $biodata->save();
            $user->roles()->attach($role_id);
            Alert::success('Berhasil mendaftar', 'Success');
            DB::commit();
        } catch (\Throwable $errors) {
            DB::rollback();
            Alert::error($errors, 'Error');
        }
        return back();
    }

    public function login()
    {
        if ($user = Sentinel::check()) {
            Alert::success("Kamu sedang login mang $user->email", 'Udah login');
            if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('visitor.index');
            }
        } else {
            return view('auth.login');
        }
    }

    public function login_store(Request $req)
    {
        if ($user = Sentinel::authenticate($req->all())) { // Buat cek ada user atau engganya di tabel user
            Alert::success('Assalamualaikum ' . $user->first_name . ' ' . $user->last_name, 'Masuk');
            if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                Alert::success('Happy ' . date('l'), 'Welcome Admin');
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('visitor.index');
            }
        } else {
            Alert::error('Gagal, Password atau Email salah!', 'Error');
            return view('auth.login');
        }
    }
}
