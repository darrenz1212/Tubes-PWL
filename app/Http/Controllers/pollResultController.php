<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pollResultController extends Controller
{
    public function index()
    {
        return view('poll.pollResult'); 
    }
}
