<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Sentinel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function edit(User $users)
    {
        dd($users);
    }

    public function store(Request $request)
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
        return response()->json(['success' => 'Product saved successfully.']);
    }

    public function destroy($id)
    {
        User::destroy($id);
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
}
