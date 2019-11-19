<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipeJobRequest;
use App\JobType;
use Illuminate\Http\Request;
use Alert;

class TipeJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JobType::latest()->get();
        return view('admin.tipejob.index', compact('data'));
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
    public function store(TipeJobRequest $request)
    {
        JobType::create($request->all());
        Alert::success('Berhasil menambah data','Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JobType $tipejob)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JobType $tipejob)
    {
        return view('admin.tipejob.edit', compact('tipejob'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipeJobRequest $request, $id)
    {
        $tipejob = JobType::findOrFail($id);
        $tipejob->update($request->all());
        Alert::success('Berhasil merubah data','Success');
        return redirect()->route('tipejob.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipejob = JobType::findOrFail($id);
        $data = count($tipejob->jobs()->get());
        if ($data > 0) {
            Alert::error('Tidak bisa dihapus karena tipe pekerjaan ini memiliki data','Error');
            return back();
        } else {
            $tipejob->delete();
            Alert::success('Berhasil menghapus data','Success');
            return back();
        }
    }
}
