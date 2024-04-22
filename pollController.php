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

        $selectedCourses = $request->selected_courses;

        $mataKuliah = [];
        foreach ($selectedCourses as $selectedCourse) {
            $mataKuliah[] = Polling::where('id_matkul', $selectedCourse)->first();
        }

        $totalSKS = 0;
        foreach ($mataKuliah as $matkul) {
            $totalSKS += $matkul->sks;
        }

        if ($totalSKS > 9) {
            return redirect()->back()->with('sks_error', 'Anda memilih lebih dari 9 SKS');
        }

        $previousVote = PollDet::where('nrp', $nrpvalidate)->first();
        if ($previousVote !== null) {
            PollDet::where('nrp', $nrpvalidate)->delete();
        }

        foreach ($mataKuliah as $m) {
            // Save data to the PollDet table
            PollDet::create([
                'nrp' => $nrpvalidate,
                'id_matkul' => $m->id_matkul //
            ]);
        }

        return redirect('poll')->with('message', 'Terima kasih atas partisipasi anda!');
    }

    public function showPoll()
    {
        $user = Auth::user()->nrp;

        $pollrest = PollDet::all()->where('nrp','=',$user);

        $course_ids = $pollrest->pluck('id_matkul');

        $course_names = matkul::whereIn('id_matkul', $course_ids)->pluck('nama_matkul');

        session(['my_vote' => $course_names]);

        return redirect('poll')->with('voted', 'Your vote has been displayed.');
    }
}
