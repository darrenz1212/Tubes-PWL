<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matkul; 

class MKController extends Controller
{
    public function index()
    {
        return view('addMk'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required',
            'kurikulum' => 'required',
            'sks' => 'required'
        ]);
    
        matkul::create($validatedData); 
    
        return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan!');
    }
    
}
