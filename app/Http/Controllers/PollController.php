<?php

namespace App\Http\Controllers;

use App\Models\PollDet;
use App\Models\Polling;
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

        $mata_kuliah = Polling::all()->where('kurikulum',$kk);

        return view('poll.poll', ['mata_kuliah' => $mata_kuliah]); // Pass $mata_kuliah to the view
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
//        $mataKuliah = Polling::all()->where('id_matkul','=',$selectedCourses);

        $mataKuliah = [];
        foreach ($selectedCourses as $selectedCourse) {
            $mataKuliah[] = Polling::where('id_matkul', $selectedCourse)->first();
        }


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
                    'id_matkul' => $m->id_matkul //
                ]);
            }
            return redirect('poll');
        }
    }

    public function showPoll()
    {
        $user = Auth::user()->nrp;

        $pollrest = PollDet::all()->where('nrp','=',$user);

//nanti buatin tampilan yang nunjukin mata kuliah apa aja yang dia pilih, sekalian nanti updatenya. gw kurang paham jujurli
//nama route nya /mypoll trus namenya my-poll
        return dd($pollrest);
    }
}
