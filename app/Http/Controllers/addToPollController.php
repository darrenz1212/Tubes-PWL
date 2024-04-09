<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\matkul;

class addToPollController extends Controller
{
    public function index()
    {
        $pollingMatkul = matkul::all();
        return view('MK.addToPoll', ['mata_kuliah' => $pollingMatkul]);
    }
}
