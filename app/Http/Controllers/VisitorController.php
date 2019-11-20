<?php

namespace App\Http\Controllers;

use Alert, Session, Sentinel;
use App\Apply;
use App\User, App\Job;
use App\Biodata;
use App\Education;
use App\Http\Requests\BiodataRequest;
use App\Http\Requests\EditBiodataRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitor.index');
    }

    public function profile()
    {
        $pendidikan = Education::where('user_id',Sentinel::getUser()->id)->with('user')->first();
        $biodata = Biodata::where('user_id', Sentinel::getUser()->id)->with('user')->first();
        return view('visitor.profile', compact('biodata','pendidikan'));
    }

    public function store(BiodataRequest $request, $id)
    {
        $path = '/images/biodata/';
        $pathCV = '/file/cv/';

        $biodata = Biodata::where('user_id', Sentinel::getUser()->id)->first();

        if ($request->foto_pribadi && $request->cv) {
            $foto = 'biodata-' . str_random() . time() . '.' . $request->file('foto_pribadi')->getClientOriginalExtension();
            $request->foto_pribadi->move(public_path($path), $foto);
            $biodata->foto_pribadi = $foto;

            // CV
            $cv = 'cv-' . Sentinel::getUser()->email . str_random(5) . '.' . $request->file('cv')->getClientOriginalExtension();
            $dd = $request->cv->move(public_path($pathCV), $cv);
            $biodata->cv = $cv;
        }

        $user_id = Sentinel::getUser()->id;

        $biodata->user_id = $user_id;
        $biodata->skill = $request->get('skill');
        $biodata->profesi = $request->get('profesi');
        $biodata->tempat_lahir = $request->get('tempat_lahir');
        $biodata->keterangan = $request->get('keterangan');
        $biodata->save();
        Alert::success('Berhasil menambah biodata', 'Success');
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
        $biodata->skill = $request->get('skill');
        $biodata->profesi = $request->get('profesi');
        $biodata->tempat_lahir = $request->get('tempat_lahir');
        $biodata->tgl_lahir = $request->get('tgl_lahir');
        $biodata->keterangan = $request->get('keterangan');
        $biodata->save();
        Alert::success('Berhasil merubah biodata', 'Success');
        return back();
    }

    public function detail_job($id)
    {
        $apply = Apply::where('user_id',Sentinel::getUser()->id)->where('job_id',$id)->get();
        $job = Job::with('company','job_types')->where('id',$id)->first();
        return view('visitor.detail_job', compact('job','apply'));
    }

    public function list_job()
    {
        $date = date('Y-m-d');
        $semua = Job::whereDate('tanggal_expired','>=',$date)->get();
        $data = Job::whereDate('tanggal_expired','>=',$date)->latest()->paginate(9);
        return view('visitor.list', compact('data','semua'));
    }
    
    public function cari_kerjaan(Request $request)
    {
        $date = date('Y-m-d');
        if ($request->ajax()) {
            $data = Job::whereDate('tanggal_expired', '>=', $date)->where('id', $request->cari)->latest()->paginate(9);
            $view =  view('visitor.list-pekerjaan', compact('data'))->render();
            return response()->json([
                'view' => $view,
                'status' => 'success'
            ]);
        }
    }
}
