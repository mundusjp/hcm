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

class ManajerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nama = Auth::user()->nama;
      $nipp = Auth::user()->nipp;
      $divisi = Auth::user()->divisi;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $jabatan = Auth::user()->jabatan;
      $now = Carbon::now();
      $all_vp = User::where('kelas_jabatan','<=','8')->get();
      $vp = User::where('supervisor_nipp',$nipp)->where('kelas_jabatan','<=','8')->where('kelas_jabatan','>=','6')->get();
      $direksi = Direksi::where('divisi',$divisi)->get();
      $assigned_tasks = Manajer::whereNotNull('nipp_pj')->get();
      $proker_tahunan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','Tahunan')->get();
      $proker_settahunan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','1/2 Tahunan')->get();
      $proker_bulanan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','Bulanan')->get();
      return view('pages.goalsetting.manajer',compact(
        'divisi',
        'jabatan',
        'nama',
        'nipp',
        'all_vp',
        'vp',
        'kelas_jabatan',
        'now',
        'direksi',
        'proker_bulanan',
        'proker_settahunan',
        'proker_tahunan',
        'assigned_tasks'
      ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $now = Carbon::now();
      $insert = new Manajer;
      $id1 = $request->program_direksi;
      $prodir = Direksi::where('id',$id1)->first();
      $insert->id_prodir = $request->program_direksi;
      $insert->program_direksi = $prodir->program_kerja;
      if(!empty($request->program_kerja_terkait)){
      $id2 = $request->program_kerja_terkait;
      $prokerkait = Manajer::where('id',$id2)->first();
      $insert->program_kerja_terkait = $prokerkait->program_kerja;
      $insert->id_prokerkait = $request->program_kerja_terkait;
      }
      $insert->nipp = $request->nipp;
      $insert->divisi = $request->divisi;
      $insert->sub_divisi = Auth::user()->sub_divisi;
      $insert->program_direksi = $prodir->program_kerja;
      $insert->program_kerja = $request->proker;
      $insert->mulai = $request->from;
      $insert->berakhir = $request->to;
      $insert->status_proker = "Belum Disampaikan";
      $insert->keterangan = "Task belum diberikan kepada DVP terkait";
      $date = Carbon::createFromFormat('Y-m-d', $request->to);

      if(($date->day == 31 && $date->month == 12)||$date->weekOfYear - $now->weekOfYear > 26){
        $insert->minggu = 52;
        $insert->kategori = "Tahunan";
      }elseif($date->weekOfYear - $now->weekOfYear <= 26 && $date->weekOfYear - $now->weekOfYear >= 5){
        $insert->minggu = $date->weekOfYear;
        $insert->kategori = "1/2 Tahunan";
      }elseif($date->weekOfYear - $now->weekOfYear < 5 && $date->weekOfYear - $now->weekOfYear > 1 ){
        $insert->minggu = $date->weekOfYear;
        $insert->kategori = "Bulanan";
      }else{
        $insert->minggu = $date->weekOfYear;
        $insert->kategori = "Mingguan";
      }
      $insert->bulan = $date->month;
      $insert->tahun = $date->year;
      $insert->save();
      return redirect('vice-president')->with('success', 'Program Vice President Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $program = Manajer::find($id);
      $nama = Auth::user()->nama;
      $nipp = Auth::user()->nipp;
      $divisi = Auth::user()->divisi;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $jabatan = Auth::user()->jabatan;
      $now = Carbon::now();
      $start = Carbon::now()->subDays(7);
      $direksi = Direksi::where('divisi',$divisi)->get();
      $proker_tahunan = Manajer::where('nipp',$nipp)->where('kategori','Tahunan')->get();
      $proker_settahunan = Manajer::where('nipp',$nipp)->where('kategori','1/2 Tahunan')->get();
      $proker_bulanan = Manajer::where('nipp',$nipp)->where('kategori','Bulanan')->get();
      return view('pages.goalsetting.ubah.manajer',compact('program','divisi','jabatan','nama','nipp','kelas_jabatan','now','direksi','proker_bulanan','proker_settahunan','proker_tahunan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $id1 = $request->program_direksi;
      $prodir = Direksi::where('id',$id1)->first();
      $date = Carbon::createFromFormat('Y-m-d', $request->to);
      $now = Carbon::now();
      if(($date->day == 31 && $date->month == 12)||$date->weekOfYear - $now->weekOfYear > 26){
        $minggu = 52;
        $kategori = "Tahunan";
      }elseif($date->weekOfYear - $now->weekOfYear <= 26 && $date->weekOfYear - $now->weekOfYear >= 5){
        $minggu = $date->weekOfYear;
        $kategori = "1/2 Tahunan";
      }elseif($date->weekOfYear - $now->weekOfYear < 5 && $date->weekOfYear - $now->weekOfYear > 1 ){
        $minggu = $date->weekOfYear;
        $kategori = "Bulanan";
      }else{
        $minggu = $date->weekOfYear;
        $kategori = "Mingguan";
      };
      $bulan = $date->month;
      $tahun = $date->year;
      if(!empty($request->program_kerja_terkait)){
        $id2 = $request->program_kerja_terkait;
        $prokerkait = Manajer::where('id',$id2)->first();
        Manajer::where('id',$id)->update([
          'program_direksi'=>$prodir->program_kerja,
          'id_prodir'=>$id1,
          'program_kerja_terkait'=>$prokerkait->program_kerja,
          'id_prokerkait'=>$id2,
          'program_kerja'=>$request->proker,
          'mulai'=>$request->from,
          'berakhir'=>$request->to,
          'minggu'=> $minggu,
          'bulan'=> $bulan,
          'tahun'=> $tahun,
          'kategori'=> $kategori
        ]);
      }else{
        Manajer::where('id',$id)->update([
          'program_direksi'=>$prodir->program_kerja,
          'id_prodir'=>$id1,
          'program_kerja'=>$request->proker,
          'mulai'=>$request->from,
          'berakhir'=>$request->to,
          'minggu'=> $minggu,
          'bulan'=> $bulan,
          'tahun'=> $tahun,
          'kategori'=> $kategori
        ]);
      };

      return redirect('vice-president')->with('success','Sukses mengubah Program Vice President!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cari = Manajer::find($id);
      $cari->delete();
      return redirect('vice-president')->with('success', 'Program Vice President Berhasil Dihapuskan!');
    }

    public function assign_task(Request $request)
    {
      Manajer::where('id',$request->id)->update([
        'target'=>$request->target,
        'nipp_pj'=>$request->nipp_pj,
        'status_proker'=>"Belum Direspon",
        'keterangan'=>"Proker Belum Direspon oleh DVP Terkait"
      ]);
      return redirect('home')->with('success','Sukses Memberikan Tugas ke DVP!');
    }

    public function konfirmasi($id){
      $today = Carbon::today();
      Manajer::where('id',$id)->update([
        'status_proker'=>"Ditolak",
        'keterangan'=>"Tugas sudah selesai dan dikonfirmasi pada ".$today
      ]);
        return redirect('home')->with('success','Sukses Menolak Tugas DVP dan diberikan keterangan!');
    }

    public function reject_page($id){
      $program = Manajer::find($id);
      return view('pages.dashboard.reject.vp', compact('program'));
    }
    public function reject_task(Request $request, $id){
      Manajer::where('id',$id)->update([
        'status_proker'=>"Ditolak",
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Menolak Tugas DVP dan diberikan keterangan!');
    }

    public function batalkan_page($id){
      $program = Manajer::find($id);
      return view('pages.dashboard.batalkan.vp', compact('program'));
    }

    public function batalkan_task(Request $request, $id){
      Manajer::where('id',$id)->update([
        'status_proker'=>"Dibatalkan",
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Membatalkan Tugas DVP dan diberikan keterangan!');
    }

    public function peringatkan_page($id){
      $program = Manajer::find($id);
      return view('pages.dashboard.peringatkan.vp', compact('program'));
    }

    public function peringatkan_task(Request $request, $id){
      Manajer::where('id',$id)->update([
        'status_proker'=>"Diperingatkan",
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Memperingatkan Tugas DVP dan diberikan keterangan!');
    }
}
