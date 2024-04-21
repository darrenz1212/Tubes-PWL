<?php

namespace App\Http\Controllers;

use App\Models\PollDet;
use Illuminate\Http\Request;
use App\Models\matkul;
use Illuminate\Support\Facades\DB;

class pollResultController extends Controller
{
    public function index()
    {
        $pollingData = PollDet::join('polling', 'polling_detail.id_matkul', '=', 'polling.id_matkul')
            ->select('polling_detail.id_matkul', 'polling.nama_matkul', DB::raw('COUNT(polling.id_matkul) AS jumlah'))
            ->groupBy('polling_detail.id_matkul', 'polling.nama_matkul')
            ->get();
        return view('poll.pollResult',['hasilPol'=>$pollingData]);
    }

    public function showPoll()
    {

    }
}
