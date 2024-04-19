<?php

namespace App\Http\Controllers;

use App\Models\PollDet;
use Illuminate\Http\Request;
use App\Models\matkul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

// Import the matkul model

class pollController extends Controller
{

    public function index()
    {
        $kk = Auth::user() -> Kurikulum;

        $mata_kuliah = DB::table('polling')
            ->join('mata_kuliah', 'polling.id_matkul', '=', 'mata_kuliah.id_matkul')
            ->select('polling.id_polling', 'mata_kuliah.*')
            ->where('kurikulum','=',$kk)
            ->get();

        return view('poll.poll', ['mata_kuliah' => $mata_kuliah]);
    }

    public function createPoll(Request $request)
    {

        $nrpvalidate = Auth::user()->nrp;

        $pollvalidate = PollDet::all();

        foreach ($pollvalidate as $p){
            if ($nrpvalidate == $p->nrp){
                dd("Anda sudah melakukan voting");
            }
        }
        $selectedCourses = $request->selected_courses;
        $mataKuliah = DB::table('polling')
            ->join('mata_kuliah', 'polling.id_matkul', '=', 'mata_kuliah.id_matkul')
            ->select('polling.id_polling', 'mata_kuliah.*')
            ->whereIn('polling.id_polling', $selectedCourses)
            ->get();


//        Syntax SQL  :
//        SELECT `polling`.`id_polling`, `mata_kuliah`.*
//        FROM `polling`
//	      INNER JOIN `mata_kuliah` ON `polling`.`id_matkul` = `mata_kuliah`.`id_matkul`;

        $totalSKS = 0;
        foreach ($mataKuliah as $matkul) {
            $totalSKS += $matkul->sks;
        }
//        $data = [
//            $mataKuliah,
//            $totalSKS
//        ];
        if ($totalSKS > 9) {

            dd('Anda memilih lebih dari 9 SKS');
        } else {
            $nrp = Auth::user()->nrp;
            foreach ($mataKuliah as $m) {
                // Simpan data ke dalam tabel PollDet
                PollDet::create([
                    'nrp' => $nrp,
                    'id_polling' => $m->id_polling // Anggap saja id_polling adalah ID mata kuliah
                ]);
            }
            return redirect('poll');
        }
    }

    public function showPoll()
    {

    }
}
