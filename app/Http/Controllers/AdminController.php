<?php

namespace App\Http\Controllers;

use App\Biodata;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Apply;
use App\Company;
use App\Education;
use App\Http\Requests\EditBiodataRequest;
use App\Role;
use App\Job;
use App\JobType;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Sentinel, Alert;

class AdminController extends Controller
{
    public function index()
    {
        $jumlah = Job::all();
        $user = User::whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['admin']);
        })->latest()->get();
        $pelamar = Apply::all();
        $perusahaan = Company::all();
        // Data Chart
        $array = array();
        $array2 = array();
        $chart = DB::table('applies')
                        ->select('status_apply', DB::raw('count(*) as total'))
                        ->groupBy('status_apply')
                        ->get();
        foreach ($chart as $key) {
            $array[] = $key->status_apply;
            $array2[] = $key->total;
        }
        return view('admin.index', compact('jumlah','user', 'pelamar','perusahaan','array','array2'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->with('biodata')->first();
        return view('admin.edit', compact('user'));
    }

    public function update(EditBiodataRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        $bio = Biodata::whereUserId($id);
        $bio->update([
            'tgl_lahir' => $request->tgl_lahir
        ]);
        Alert::success('Berhasil merubah data','Success');
        return redirect()->back();
    }

    public function store(RegisterRequest $request)
    {
        $id = Sentinel::findRoleByName('visitor');
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
        $user = User::where('id',$id)->first()->applies()->first();
        if ($user == null) {
            User::destroy($id);
            Alert::success('Berhasil menghapus data','Success');
            return back();
        } else {
            Alert::success('User pernah meng apply data, tidak bisa di hapus','Error');
            return back();
        }
    }

    public function dataUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($q) {
                $q->whereNotIn('name', ['admin']);
            })->orderBy('created_at','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.layouts._action', [
                        'row' => $row,
                        'url_edit' => route('admin.edit', $row->id),
                        'url_show' => route('admin.show', $row->id),
                        'url_destroy' => route('admin.destroy', $row->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = User::whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['admin']);
        })->orderBy('created_at','desc')->get();
        return view('admin.data-user', compact('data'));
    }

    public function userHapus()
    {
        $user = User::onlyTrashed()->latest()->get();
        return view('admin.datauser-hapus', compact('user'));
    }

    public function userAktif($id)
    {
        $user = User::withTrashed()
            ->where('id', $id)
            ->restore();
        Biodata::withTrashed()->where('user_id',$id)->restore();
        Education::withTrashed()->where('user_id',$id)->restore();
        Alert::success('Berhasil mengembalikan data','Success');
        return back();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $data = Apply::where('user_id',$id)->latest()->paginate(5);
        return view('admin.show', compact('user','data'));
    }
}
