<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kk.index', [
            'kks' => KartuKeluarga::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'no' => 'required|string|max:16|unique:kartu_keluarga',
            'KepalaKeluarga' => 'required|string|max:100'
        ], [
            'no.required' => 'Nomor Kartu Keluarga wajib di isi!',
            'no.unique' => 'Nomor kartu sudah terdaftar. Silahkan periksa kembali nomor anda',
            'KepalaKeluarga.required' => 'Nama Kepala Keluarga wajib di isi!'
        ])->validate();
        $data = $request->all();
        $kartuKeluarga = new KartuKeluarga($data);
        $kartuKeluarga->save();
        return redirect(route('kk-list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KartuKeluarga $kartuKeluarga)
    {
        //
    }
}
