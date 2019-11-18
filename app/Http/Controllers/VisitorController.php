<?php

namespace App\Http\Controllers;

use Alert, Session, Sentinel;
use App\User;
use App\Biodata;
use App\Http\Requests\BiodataRequest;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitor.index');
    }

    public function profile()
    {
        $biodata = Biodata::where('user_id', Sentinel::getUser()->id)->with('user')->first();
        return view('visitor.profile', compact('biodata'));
    }

    public function store(BiodataRequest $request)
    {
        $path = '/images/biodata/';

        $biodata = new Biodata();
        if ($request->foto_pribadi) {
            $foto = 'biodata-' . str_random() . time() . '.' . $request->file('foto_pribadi')->getClientOriginalExtension();
            $request->foto_pribadi->move(public_path($path), $foto);
            $biodata->foto_pribadi = $foto;
        }

        $user_id = Sentinel::getUser()->id;

        $biodata->user_id = $user_id;
        $biodata->nama = $request->get('nama');
        $biodata->agama = $request->get('agama');
        $biodata->tempat_lahir = $request->get('tempat_lahir');
        $biodata->tgl_lahir = $request->get('tgl_lahir');
        $biodata->keterangan = $request->get('keterangan');
        $biodata->save();
        Alert::success('Berhasil menambah Biodata', 'Success');
        return back();
    }

    public function update(BiodataRequest $request, $id)
    {
        $path = '/images/biodata/';


        $biodata = Biodata::where('user_id', Sentinel::getUser()->id)->first();
        $foto_lama = public_path('images/biodata/' . $biodata->foto_pribadi);
        if ($request->foto_pribadi) {
            $foto = 'biodata-' . str_random() . time() . '.' . $request->file('foto_pribadi')->getClientOriginalExtension();
            $request->foto_pribadi->move(public_path($path), $foto);
            $biodata->foto_pribadi = $foto;
        }

        $user_id = Sentinel::getUser()->id;

        $biodata->user_id = $user_id;
        $biodata->nama = $request->get('nama');
        $biodata->agama = $request->get('agama');
        $biodata->tempat_lahir = $request->get('tempat_lahir');
        $biodata->tgl_lahir = $request->get('tgl_lahir');
        $biodata->keterangan = $request->get('keterangan');
        $biodata->save();

        if ($biodata->save()) {
            if (file_exists($foto_lama)) {
                unlink($foto_lama);
            }
        } else {
            Alert::error('Gagal', 'error');
            return back();
        }
        Alert::success('Berhasil merubah biodata', 'Success');
        return back();
    }
}
