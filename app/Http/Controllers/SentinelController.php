<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use App\Biodata;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SigninRequest;
use Sentinel, Event, Reminder;
Use App\User;
Use App\Events\ReminderEvent;

class SentinelController extends Controller
{
    public function signup()
    {
        if ($user = Sentinel::check()) {
            Alert::success("Kamu sedang login mang $user->email", 'Udah login');
            if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('visitor.index');
            }
        } else {
            return view('auth.register');
        }
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
        return redirect()->route('signin');
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

    public function login_store(SigninRequest $req)
    {
        $credentials = [
            'email' => $req->email
        ];
        $cek = User::where('email',$req->email)->first();
        if ($cek == null ) {
            Alert::error('Akun anda tidak aktif/tidak ada, silakan hubungi admin');
            return back();
        } else {
            if ($user = Sentinel::authenticate($req->all())) { // Buat cek ada user atau engganya di tabel user
                Alert::success('Assalamualaikum ' . $user->first_name . ' ' . $user->last_name, 'Masuk');
                if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                    Alert::success('Happy ' . date('l'), 'Welcome Admin');
                    return redirect()->route('admin.index');
                } elseif (Sentinel::getUser()->roles()->first()->slug == 'visitor') {
                    dd(1);
                    return redirect()->route('visitor.index');
                }
            } else {
                Alert::error('Gagal, Password atau Email salah!', 'Error');
                return back();
            }
        }
    }

    public function logout()
    {
        Sentinel::logout();
        Alert::success('Terima kasih sudah menggunakan lolokeran','Success');
        return redirect('/');
    }

    public function edit($id, $code)
    {
        $user = Sentinel::findById($id);
        if (Reminder::exists($user, $code)) {
            return view('auth.sendpassword', [
                'id' => $id,
                'code' => $code
            ]);
        } else {
            return redirect()->route('awal');
        }
    }

    public function ganti($id, $code, Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'same:password'
        ]);

        $user = Sentinel::findById($id);
        $reminder = Reminder::exists($user, $code);

        if ($reminder) {
            Alert::success('Berhasil merubah password','Success');
            Reminder::complete($user, $code, $request->password);
            return redirect()->route('signin');
        } else {
            Alert::warning('Password harus sama','Error');
        }
    }

    public function forgot_pass(Request $request)
    {
        $getUser = User::where('email',$request->email)->first();

        if ($getUser) {
            $user = Sentinel::findById($getUser->id);
            ($reminder = Reminder::exists($user)) || ($reminder = Reminder::create($user));
            Event::dispatch(new ReminderEvent($user, $reminder));
            Alert::success('Silahkan cek email','Success');
        } else {
            Alert::error('Email tidak ada','Error');
        }
        return view('auth.passwords.email');
    }
}
