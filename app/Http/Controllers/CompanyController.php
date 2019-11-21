<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\EditCompanyRequest;
use Illuminate\Http\Request;
use App\Company;
use Alert, Sentinel;
use App\Job;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::latest()->get();
        return view('admin.company.index', compact('company'));
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
    public function store(CompanyRequest $request)
    {
        $path = '/images/perusahaan/';

        $company = new company();
        if ($request->foto_perusahaan) {
            $foto = 'perusahaan-' . str_random() . time() . '.' . $request->file('foto_perusahaan')->getClientOriginalExtension();
            $request->foto_perusahaan->move(public_path($path), $foto);
            $company->foto_perusahaan = $foto;
        }

        $company->nama_perusahaan = $request->get('nama_perusahaan');
        $company->alamat_perusahaan = $request->get('alamat_perusahaan');
        $company->waktu_bekerja = $request->get('waktu_bekerja');
        $company->jenis_industri = $request->get('jenis_industri');
        $company->deskripsi_perusahaan = $request->get('deskripsi_perusahaan');
        $company->save();
        Alert::success('Berhasil menambah data', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCompanyRequest $request, $id)
    {
        $path = '/images/perusahaan/';

        $company = Company::findOrFail($id);
        $foto_lama = public_path('images/perusahaan/' . $company->foto_perusahaan);

        if ($request->foto_perusahaan) {
            $foto = 'perusahaan-' . str_random() . time() . '.' . $request->file('foto_perusahaan')->getClientOriginalExtension();
            $request->foto_perusahaan->move(public_path($path), $foto);
            $company->foto_perusahaan = $foto;
            if ($company->foto_perusahaan = $foto) {
                if (file_exists($foto_lama)) {
                    unlink($foto_lama);
                }
            }
        }

        $company->nama_perusahaan = $request->get('nama_perusahaan');
        $company->alamat_perusahaan = $request->get('alamat_perusahaan');
        $company->waktu_bekerja = $request->get('waktu_bekerja');
        $company->jenis_industri = $request->get('jenis_industri');
        $company->deskripsi_perusahaan = $request->get('deskripsi_perusahaan');
        $company->save();
        Alert::success('Berhasil merubah perusahaan', 'Success');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function destroy($id)
    {
        $data = Job::where('company_id',$id)->get();
        if (count($data) > 0) {
            Alert::success('Gagal menghapus, sudah pernah menginputkan pekerjaan','Error');
            return back();
        } else if (count($data) == 0) {
            Company::destroy($id);
            Alert::success('Berhasil menghapus data','Success');
            return redirect()->route('company.index');
        } else {
            return back();
        }
    }

    public function datahapus()
    {
        $company = Company::onlyTrashed()->latest()->get();
        return view('admin.company.datahapus', compact('company'));
    }

    public function restore($id)
    {
        $user = Company::withTrashed()->where('id', $id)->restore();
        Alert::success('Berhasil mengembalikan data', 'Success');
        return back();
    }
}
