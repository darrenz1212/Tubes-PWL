<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

     public function store(Request $request): RedirectResponse
     {
         try {
             $request->validate([
                 'nama' => ['required', 'string', 'max:255'],
                 'nrp' =>['required','string','max:7'],
                 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                 'password' => ['required', 'confirmed', Rules\Password::defaults()],

             ]);

             $pullkk = $request->nrp;

             $kk = substr($pullkk,0,2);

             if ($kk >= "20"){
                 $kurikulum = 2020;
             }else{
                 $kurikulum = 2019;
             }

             $user = User::create([
                 'nrp' => $request->nrp,
                 'nama' => $request->nama,
                 'email' => $request->email,
                 'password' => Hash::make($request->password),
                 'prodi' => $request->prodi,
                 'fakultas'=>$request->fakultas,
                 'role' => $request->role,
                 'kurikulum' => $kurikulum
             ]);

             event(new Registered($user));

             Auth::login($user);

             return redirect(route('login', absolute: false));

         } catch (QueryException $e) {
             if ($e->errorInfo[1] === 1062) {
                 return redirect()->back()->withErrors(['nrp' => 'NRP sudah pernah didaftarkan.'])->withInput();
             }
         }
    }
}
