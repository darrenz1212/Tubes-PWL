<?php

namespace App\Http\Controllers;

use App\Models\PollDet;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class updateDeleteController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('updateDelete', compact('users'));
    }

    public function showUpdate(User $user)
    {
        return view('userUpdate', compact('user'));
    }


    public function update(Request $request, User $user)
{

    $request->validate([
        'nrp' => 'required',
        'nama' => 'required',
        'email' => 'required|email',
        'prodi' => 'required',
        'fakultas' => 'required',
    ]);

    try {
        // pass diganti
        if ($request->filled('password')) {
            $user->update([
                'nrp' => $request->nrp,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'prodi' => $request->prodi,
                'fakultas' => $request->fakultas,
                'role' => $request->role
            ]);
        } else {
            // pass kosong
            $user->update([
                'nrp' => $request->nrp,
                'nama' => $request->nama,
                'email' => $request->email,
                'prodi' => $request->prodi,
                'fakultas' => $request->fakultas,
                'role' => $request->role
            ]);
        }
    } catch (\Exception $e) {
        // Log or display error
        dd($e->getMessage());
    }

    return redirect()->route('updateDelete')->with('success', 'Data user berhasil diperbarui.');
}



    public function show(User $user){
        return view('userUpdate', compact('user'));
    }


    public function destroy(User $user)
    {
        $isPoll = PollDet::pluck('nrp')->toArray();

        if (Auth::user()->nrp == $user->nrp){
            dd("Error");// tambahin eror "tidak bisa mendelete akun sendiri

        }else{
            foreach ($isPoll as $pollNrp) {
                if ($pollNrp === $user->nrp) {
                //ini error jadi admin gabisa hapus user yang udah nge vote. tinggal nanti bikinin erornya
                    dd("nrp ada di dalam array isPoll");
                }
            }
            $user->delete();
            return redirect()->route('updateDelete');
        };

    }

}
