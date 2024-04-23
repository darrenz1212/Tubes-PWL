<?php

namespace App\Http\Controllers;

use App\Models\Polling;
use Illuminate\Http\Request;

class MKController extends Controller
{
    public function index()
    {
        return view('addMk');
    }

    public function indexDelete()
    {
        $polling = Polling::all();

        return view('delMk', ['polling'=>$polling]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required',
            'kurikulum' => 'required',
            'sks' => 'required',
            'tanggal_dibuka' => 'required',
            'tanggal_ditutup' => 'required'
            // Add more validation rules for other fields if needed
        ]);

        // Create a new instance of MataKuliah model and fill it with the validated data
        Polling::create($validatedData); // Corrected the model name to MataKuliah

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    public function deleteMk(Request $request)
    {
        $request->validate([
            'selected_courses' => 'required|array',
        ]);
        $course = $request->selected_courses; // Perbaiki typo menjadi selected_courses

        foreach ($course as $c){
            $deletedCount = Polling::where('id_matkul', $c)->delete();

        }

        if ($deletedCount > 0) {
            session()->flash('message', 'Berhasil menghapus ' . $deletedCount . ' mata kuliah.');
        } else {
            session()->flash('sks_error', 'Tidak ada mata kuliah yang dipilih atau mata kuliah tidak ditemukan.');
        }

        return redirect()->route('delete-mk');
    }

}
