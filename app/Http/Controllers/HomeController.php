<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel, Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function awal()
    {
        if ($user = Sentinel::check()) {
            Alert::success("Kamu sedang login mang $user->email", 'Udah login');
            if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('visitor.index');
            }
        } else {
            return view('welcome');
        }
        
    }
    public function index()
    {
        return view('home');
    }
}
