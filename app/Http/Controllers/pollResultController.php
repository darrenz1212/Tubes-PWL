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
        $pollingDetail = PollDet::select('polling.id_matkul', 'mata_kuliah.nama_matkul', DB::raw('COUNT(*) as jumlah'))
            ->join('polling', 'polling_detail.id_polling', '=', 'polling.id_polling')
            ->join('mata_kuliah', 'polling.id_matkul', '=', 'mata_kuliah.id_matkul')
            ->groupBy('polling.id_matkul', 'mata_kuliah.nama_matkul')
            ->get();
        return view('poll.pollResult',['hasilPol'=>$pollingDetail]);
    }

    public function showPoll()
    {


    }
}
