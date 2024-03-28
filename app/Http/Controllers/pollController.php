<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matkul; // Import the matkul model

class pollController extends Controller
{
        public function index()
    {
        $mata_kuliah = matkul::all(); // Fetch all courses from the matkul model
        return view('poll.poll', ['mata_kuliah' => $mata_kuliah]); // Pass $mata_kuliah to the view
    }

}