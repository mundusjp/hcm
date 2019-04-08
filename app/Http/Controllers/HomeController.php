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
use App\Performa;
use App\Company;
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
        $page = $_SERVER['PHP_SELF'];
        $sec = "180";
        header("Refresh: $sec; url=$page");
        $nama = Auth::user()->nama;
        $nipp = Auth::user()->nipp;
        $divisi = Auth::user()->divisi;
        $kelas_jabatan = Auth::user()->kelas_jabatan;
        $jabatan = Auth::user()->jabatan;
        $now = Carbon::now();
        $now->setTimezone('Asia/Jakarta');
        $officer = User::where('supervisor_nipp',$nipp)->get();
        $company = Company::find(1);
        $performa_saya = Performa::where('nipp',$nipp)->first();
        ############################ UNTUK DIREKSI ####################################
        $direksi = Direksi::where('divisi',$divisi)->get();
        ###############################################################################
        ############################### UNTUK VP ######################################
        $assigned_proker_vp = Manajer::whereNotNull('nipp_pj')->latest('updated_at')->paginate(10);
        $proker_vp_tahunan = Manajer::where('nipp',$nipp)->where('kategori','Tahunan')->get();
        $proker_vp_settahunan = Manajer::where('nipp',$nipp)->where('kategori','1/2 Tahunan')->get();
        $proker_vp_bulanan = Manajer::where('nipp',$nipp)->where('kategori','Bulanan')->get();
        $proker_vp_mingguan = Manajer::where('nipp',$nipp)->where('kategori','Mingguan')->get();
        $performa_dvp = Performa::where('supervisor_nipp',$nipp)->get();
        ###############################################################################
        ############################### UNTUK DVP #####################################
        $officer_dvp = User::where('supervisor_nipp',$nipp)->get();
        $proker_dari_vp = Manajer::where('nipp_pj',$nipp)->get();
        $proker_dvp = Task::where('nipp',$nipp)->get();
        $today = Carbon::now()->format('Y-m-d');
        $logbook_harian = Logbook::where('nipp',Auth::user()->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan',$now->month)->where('tahun',$now->year)->get();
        ###############################################################################
        ############################### UNTUK Officer #################################
        $proker_dari_dvp = Task::where('nipp_pj',$nipp)->get();
        $exist_proker_dari_dvp = Task::where('nipp_pj',$nipp)->first();
        return view('pages.dashboard',compact(
          'performa_saya',
          'performa_dvp',
          'divisi',
          'jabatan',
          'nama',
          'nipp',
          'kelas_jabatan',
          'now',
          'direksi',
          'officer',
          'assigned_proker_vp',
          'proker_vp_mingguan',
          'proker_vp_bulanan',
          'proker_vp_settahunan',
          'proker_vp_tahunan',
          'proker_dari_vp',
          'proker_dari_dvp',
          'exist_proker_dari_dvp',
          'proker_dvp',
          'logbook_harian',
          'company'
        ));
    }
}
