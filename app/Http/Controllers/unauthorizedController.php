<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class unauthorizedController extends Controller
{
    public function index()
    {
        return view('unauthorized');
    }
}