<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class updateDeleteController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('updateDelete', compact('users'));
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
            ]);
        } else {
            // pass kosong
            $user->update([
                'nrp' => $request->nrp,
                'nama' => $request->nama,
                'email' => $request->email,
                'prodi' => $request->prodi,
                'fakultas' => $request->fakultas,
            ]);
        }
    } catch (\Exception $e) {
        // Log or display error
        dd($e->getMessage());
    }

    return redirect()->route('updateDelete');
}



    public function showUpdate(User $user){

        return view('userUpdate', compact('user'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('updateDelete');
    }

}
