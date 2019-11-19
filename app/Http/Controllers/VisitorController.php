<?php

namespace App\Http\Controllers;

use Alert, Session, Sentinel;
use App\User, App\Job;
use App\Biodata;
use App\Education;
use App\Http\Requests\BiodataRequest;
use App\Http\Requests\EditBiodataRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $job = Job::with('company')->latest()->get();
        return view('visitor.index', compact('job'));
    }

    public function profile()
    {
        $pendidikan = Education::where('user_id',Sentinel::getUser()->id)->with('user')->first();
        $biodata = Biodata::where('user_id', Sentinel::getUser()->id)->with('user')->first();
        return view('visitor.profile', compact('biodata','pendidikan'));
    }

    public function store(BiodataRequest $request)
    {
        $path = '/images/biodata/';
        $pathCV = '/file/cv/';

        $biodata = new Biodata();
        if ($request->foto_pribadi || $request->cv) {
            $foto = 'biodata-' . str_random() . time() . '.' . $request->file('foto_pribadi')->getClientOriginalExtension();
            $request->foto_pribadi->move(public_path($path), $foto);
            $biodata->foto_pribadi = $foto;
            // CV
            $cv = 'cv-' . Sentinel::getUser()->email . str_random(5) . '.' . $request->file('cv')->getClientOriginalExtension();
            $request->cv->move(public_path($pathCV), $cv);
            $biodata->cv = $cv;
        }

        $user_id = Sentinel::getUser()->id;

        $biodata->user_id = $user_id;
        $biodata->tempat_lahir = $request->get('tempat_lahir');
        $biodata->tgl_lahir = $request->get('tgl_lahir');
        $biodata->keterangan = $request->get('keterangan');
        $biodata->save();
        Alert::success('Berhasil menambah Biodata', 'Success');
        return back();
    }

    public function update(EditBiodataRequest $request, $id)
    {
        $path = '/images/biodata/';
        $pathCV = '/file/cv/';

        $biodata = Biodata::where('user_id', Sentinel::getUser()->id)->first();

        $foto_lama = public_path('images/biodata/' . $biodata->foto_pribadi);
        $cv_lama = public_path('file/cv/' . $biodata->cv);

        if ($request->foto_pribadi || $request->cv) {
            $foto = 'biodata-' . str_random() . time() . '.' . $request->file('foto_pribadi')->getClientOriginalExtension();
            $request->foto_pribadi->move(public_path($path), $foto);
            
            if ($biodata->foto_pribadi = $foto) {
                if (file_exists($foto_lama)) {
                    unlink($foto_lama);
                }
            }
            // CV
            $cv = 'cv-' . Sentinel::getUser()->email . str_random(5) . '.' . $request->file('cv')->getClientOriginalExtension();
            $request->foto_pribadi->move(public_path($pathCV), $cv);
            if ($biodata->cv = $cv) {
                if (file_exists($cv_lama)) {
                    unlink($cv_lama);
                }
            }
        }

        $user_id = Sentinel::getUser()->id;

        $biodata->user_id = $user_id;
        $biodata->tempat_lahir = $request->get('tempat_lahir');
        $biodata->tgl_lahir = $request->get('tgl_lahir');
        $biodata->keterangan = $request->get('keterangan');
        $biodata->save();
        Alert::success('Berhasil merubah biodata', 'Success');
        return back();
    }
}
