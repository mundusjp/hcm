<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\Direksi;
use App\Task;
use App\User;
use App\Logbook;
use App\Divisi;
use App\Manajer;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nama = Auth::user()->nama;
        $nipp = Auth::user()->nipp;
        $divisi = Auth::user()->divisi;
        $kelas_jabatan = Auth::user()->kelas_jabatan;
        $jabatan = Auth::user()->jabatan;
        $now = Carbon::now();
        $start = Carbon::now()->subDays(7);
        $direksi = Direksi::where('divisi',$divisi)->get();
        ############################### UNTUK VP ######################################
        $officer_vp = User::where('supervisor_nipp',$nipp)->get();
        $assigned_proker_vp = Manajer::whereNotNull('nipp_pj')->paginate(10);
        $proker_vp_tahunan = Manajer::where('nipp',$nipp)->where('kategori','Tahunan')->get();
        $proker_vp_settahunan = Manajer::where('nipp',$nipp)->where('kategori','1/2 Tahunan')->get();
        $proker_vp_bulanan = Manajer::where('nipp',$nipp)->where('kategori','Bulanan')->get();
        $proker_vp_mingguan = Manajer::where('nipp',$nipp)->where('kategori','Mingguan')->get();
        ###############################################################################
        return view('pages.dashboard',compact(
          'divisi',
          'jabatan',
          'nama',
          'nipp',
          'kelas_jabatan',
          'now',
          'direksi',
          'officer_vp',
          'assigned_proker_vp',
          'proker_vp_mingguan',
          'proker_vp_bulanan',
          'proker_vp_settahunan',
          'proker_vp_tahunan'
        ));
    }
}
