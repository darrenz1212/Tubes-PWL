<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matkul; // Add the import statement for MataKuliah model

class MKController extends Controller
{
    public function index()
    {
        return view('addMk'); 
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required',
            'kurikulum' => 'required',
            'sks' => 'required'
            // Add more validation rules for other fields if needed
        ]);
    
        // Create a new instance of MataKuliah model and fill it with the validated data
        matkul::create($validatedData); // Corrected the model name to MataKuliah
    
        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan!');
    }
    
}
