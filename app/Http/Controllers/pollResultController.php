<?php

namespace App\Http\Controllers;

use App\Models\PollDet;
use App\Models\Polling;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Models\matkul;
use Illuminate\Support\Facades\DB;

class pollResultController extends Controller
{
    public function index(Request $request)
    {
        $pollingData = PollDet::join('polling', 'polling_detail.id_matkul', '=', 'polling.id_matkul')
            ->select('polling_detail.id_matkul', 'polling.nama_matkul', DB::raw('COUNT(polling.id_matkul) AS jumlah'))
            ->groupBy('polling_detail.id_matkul', 'polling.nama_matkul')
            ->get();

        $idMatkul = $request->id_matkul;

        $showPoll = PollDet::all()->where('id_matkul','=',$idMatkul)->pluck('nrp');

        return view('poll.pollResult',['hasilPol'=>$pollingData, 'detVote' => $showPoll]);
    }

    public function showPoll(Request $request)
    {
        $idMatkul = $request->id_matkul;

        $showPoll = PollDet::all()->where('id_matkul','=',$idMatkul)->pluck('nrp');

        dd($showPoll);


    }

    public function addMatkul(Request $request)
    {
        $idMatkul = $request->id_matkul;
        $polling = Polling::find($idMatkul);

        if (!$polling) {
            return redirect()->back()->with('error', 'Invalid id_matkul.');
        }
        $existingMatkul = Matkul::where('kode_matkul', $idMatkul)->first();

        if ($existingMatkul) {
            return redirect()->route('pollResult')->with('error', 'Matkul already exists in database.');
        }
        Matkul::create([
            'kode_matkul' => $idMatkul,
            'kurikulum' => $polling->kurikulum,
            'nama_matkul' => $polling->nama_matkul,
            'sks' => $polling->sks,
        ]);

        return redirect(route('pollResult'));
    }



}