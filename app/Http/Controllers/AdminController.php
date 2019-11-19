<?php

namespace App\Http\Controllers;

use App\Biodata;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Role;
use App\Job;
use Illuminate\Http\Request;
use DataTables;
use Sentinel, Alert;

class AdminController extends Controller
{
    public function index()
    {
        $jumlah = Job::all();
        $user = User::whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['admin']);
        })->latest()->get();
        return view('admin.index', compact('jumlah','user'));
    }

    public function edit(User $users)
    {
        dd($users);
    }

    public function store(RegisterRequest $request)
    {
        $id = Sentinel::findRoleByName('visitor');
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $user = Sentinel::registerAndActivate($request->all());
        $user->roles()->attach($id);
        $id = $user->id;
        $tgl_lahir = $request->tgl_lahir;
        $biodata = new Biodata();
        $biodata->user_id = $id;
        $biodata->tgl_lahir = $tgl_lahir;
        $biodata->save();
        return response()->json(['success' => 'Product saved successfully.']);
    }

    public function destroy($id)
    {
        User::destroy($id);
        Alert::success('Berhasil menghapus data','Success');
        return back();
    }

    public function dataUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($q) {
                $q->whereNotIn('name', ['admin']);
            })->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.layouts._action', [
                        'row' => $row,
                        'url_edit' => route('admin.edit', $row->id),
                        'url_destroy' => route('admin.destroy', $row->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = User::whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['admin']);
        })->latest()->get();
        return view('admin.data-user', compact('data'));
    }

    public function userHapus()
    {
        $user = User::onlyTrashed()->get();
        return view('admin.datauser-hapus', compact('user'));
    }

    public function userAktif($id)
    {
        $user = User::withTrashed()
            ->where('id', $id)
            ->restore();
        Alert::success('Berhasil mengembalikan data','Success');
        return back();
    }
}
