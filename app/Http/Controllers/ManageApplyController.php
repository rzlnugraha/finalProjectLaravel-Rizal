<?php

namespace App\Http\Controllers;

use App\Apply;
use App\Jobs\EmailStatus;
use Illuminate\Http\Request;
use App\User;
use Alert;

class ManageApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Apply::with('user','job')->where('status_apply','waiting')->latest()->get();
        return view('admin.apply.index', compact('data'));
    }
    
    public function approve()
    {
        $data = Apply::with('user','job')->where('status_apply','approve')->latest()->get();
        return view('admin.apply.approve', compact('data'));
    }
    
    public function reject()
    {
        $data = Apply::with('user','job')->where('status_apply','reject')->latest()->get();
        return view('admin.apply.reject', compact('data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Apply::findOrFail($id);
        return view('admin.apply.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $apply = Apply::findOrFail($id);
        $status = EmailStatus::dispatch($apply);
        $update = $apply->update([
            'status_apply' => $request->status_apply
        ]);
        Alert::success('Berhasil merubah status','Success');
        return redirect()->route('manage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
