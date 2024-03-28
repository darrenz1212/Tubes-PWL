<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penduduk.index', [
            'penduduk' => Penduduk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getNoKK = KartuKeluarga::select(['no', 'KepalaKeluarga'])->get();
        return Response()->view('penduduk.create', ['kks' => $getNoKK]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'nik' => 'required|string|max:16|unique:penduduk',
            'kartu_keluarga_nomor' => 'required|string|max:100',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'gol_darah' => 'required'
        ], [
            'nik.required' => 'NIK wajib di isi!',
            'nik.unique' => 'NIK sudah terdaftar. Silahkan periksa kembali NIK anda',
            'kartu_keluarga_nomor.required' => 'No Kartu Keluarga wajib di isi!',
            'nama.required' => 'Nama wajib di isi!',
            'alamat.required' => 'Alamat wajib di isi!',
            'tgl_lahir.required' => 'Tanggal Lahir wajib di isi!',
            'agama.required' => 'Agama wajib di isi!',
            'gol_darah.required' => 'Golongan Darah wajib di isi!'
        ])->validate();

        $data = $request->all();
        $penduduk = new Penduduk($data);
        $penduduk->save();
        return redirect(route('pdk-list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
