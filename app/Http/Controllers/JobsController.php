<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Job;
use Alert;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::with('job_types')->latest()->get();
        return view('admin.job.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $path = '/images/job/';

        $job = new Job();
        if ($request->foto_perusahaan) {
            $foto = 'perusahaan-' . str_random() . time() . '.' . $request->file('foto_perusahaan')->getClientOriginalExtension();
            $request->foto_perusahaan->move(public_path($path), $foto);
            $job->foto_perusahaan = $foto;
        }

        $job->tipe_job = $request->get('tipe_job');
        $job->nama_pekerjaan = $request->get('nama_pekerjaan');
        $job->nama_perusahaan = $request->get('nama_perusahaan');
        $job->requirements = $request->get('requirements');
        $job->tanggal_expired = $request->get('tanggal_expired');
        $job->gaji = $request->get('gaji');
        $job->alamat_perusahaan = $request->get('alamat_perusahaan');
        $job->deskripsi = $request->get('deskripsi');
        $job->save();
        Alert::success('Berhasil menambah Job', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('admin.job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $path = '/images/job/';
        
        $job = Job::findOrFail($id);
        $foto_lama = public_path('images/job/' . $job->foto_perusahaan);

        if ($request->foto_perusahaan) {
            $foto = 'perusahaan-' . str_random() . time() . '.' . $request->file('foto_perusahaan')->getClientOriginalExtension();
            $request->foto_perusahaan->move(public_path($path), $foto);
            $job->foto_perusahaan = $foto;
        }

        $job->tipe_job = $request->get('tipe_job');
        $job->nama_pekerjaan = $request->get('nama_pekerjaan');
        $job->nama_perusahaan = $request->get('nama_perusahaan');
        $job->requirements = $request->get('requirements');
        $job->tanggal_expired = $request->get('tanggal_expired');
        $job->gaji = $request->get('gaji');
        $job->alamat_perusahaan = $request->get('alamat_perusahaan');
        $job->deskripsi = $request->get('deskripsi');

        if ($job->save()) {
            if (file_exists($foto_lama)) {
                unlink($foto_lama);
            }
        } else {
            Alert::error('Gagal', 'error');
            return back();
        }
        Alert::success('Berhasil merubah Job', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::destroy($id);
        Alert::success('Berhasil menghapus data','Success');
        return back();
    }
}
