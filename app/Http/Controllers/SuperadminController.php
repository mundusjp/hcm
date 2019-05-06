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
use DateTime;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $now = Carbon::now()->setTimezone('Asia/Jakarta');
        $alluser = User::where('kelas_jabatan','>',8)->orWhere('kelas_jabatan','TNO')->get();

        $yangbelum = [];
        foreach($alluser as $user){
          $checklogbook = Logbook::where('nipp', $user->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan', $now->month)->where('tahun',$now->year)->first();
          if(empty($checklogbook)){
            array_push($yangbelum, $user->nipp);
          }
        }
        $yangbelum_count = count($yangbelum);
        return view('admin.home',compact('users','yangbelum','yangbelum_count'));
    }

    public function user_index(){
      $users = User::all();
      return view('admin.user.user',compact('users'));
    }
    public function user_tambah(){
      return view('admin.user.add');
    }

    public function perusahaan_index(){
      $visi_perusahaan = Perusahaan::where('misi',null)->get();
      $misi_perusahaan = Perusahaan::where('visi',null)->get();
      return view('admin.goalsetting.perusahaan',compact('visi_perusahaan','misi_perusahaan'));
    }

    public function perusahaan_edit($id){
      $visimisi = Perusahaan::find($id);
      return view('admin.goalsetting.edit.perusahaan',compact('visimisi'));
    }

    public function direksi_index(){
      $direksi = User::where('kelas_jabatan','>',3)->where('kelas_jabatan','<',6)->get();
      return view('admin.goalsetting.direksi',compact('direksi'));
    }

    public function direksi_detail($id){
      $direksi = User::find($id);
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $proker = Direksi::where('nipp',$direksi->nipp)->get();
      $seluruh_direksi = User::where('kelas_jabatan','<=','5')->where('supervisor_nipp','277056896')->get();
      return view('admin.goalsetting.detail.direksi', compact('direksi','proker','now','seluruh_direksi'));
    }

    public function direksi_edit($id){
      $program = Direksi::find($id);
      return view('admin.goalsetting.edit.direksi', compact('program'));
    }

    public function vp_index(){
      $vp = User::where('kelas_jabatan','>',5)->where('kelas_jabatan','<',9)->get();
      return view('admin.goalsetting.vp', compact('vp'));
    }

    public function vp_detail($id){
      $vp = User::find($id);
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $proker = Manajer::where('nipp',$vp->nipp)->get();
      $direksi = Direksi::where('divisi',$vp->divisi)->get();
      $kategori = [
        '0'=>"Mingguan",
        '1'=>"Bulanan",
        '2'=>"Tahunan"
      ];
      $proker_mingguan = Manajer::where('sub_divisi',$vp->sub_divisi)->where('kategori','Mingguan')->get();
      $proker_tahunan = Manajer::where('sub_divisi',$vp->sub_divisi)->where('kategori','Tahunan')->get();
      $proker_bulanan = Manajer::where('sub_divisi',$vp->sub_divisi)->where('kategori','Bulanan')->get();
      return view('admin.goalsetting.detail.vp', compact('kategori','vp','direksi','proker','now','proker_mingguan','proker_bulanan','proker_tahunan'));
    }

    public function vp_edit($id){
      $program = Manajer::find($id);
      $user = User::where('nipp',$program->nipp)->first();
      $nama = $user->nama;
      $nipp = $user->nipp;
      $divisi = $user->divisi;
      $kelas_jabatan = $user->kelas_jabatan;
      $jabatan = $user->jabatan;
      $now = Carbon::now();
      $now->setTimezone('Asia/Jakarta');
      $direksi = Direksi::where('divisi',$divisi)->get();
      $proker_mingguan = Manajer::where('nipp',$nipp)->where('kategori','Mingguan')->where('minggu',$now->weekOfYear)->get();
      $proker_tahunan = Manajer::where('nipp',$nipp)->where('kategori','Tahunan')->where('tahun',$now->year)->get();
      $proker_settahunan = Manajer::where('nipp',$nipp)->where('kategori','1/2 Tahunan')->where('tahun',$now->year)->get();
      $proker_bulanan = Manajer::where('nipp',$nipp)->where('kategori','Bulanan')->where('bulan',$now->month)->get();
      $program = Manajer::find($id);
      return view('admin.goalsetting.edit.vp',compact('program','divisi','jabatan','nama','nipp','kelas_jabatan','now','direksi','proker_mingguan','proker_bulanan','proker_settahunan','proker_tahunan'));
    }

    public function dvp_index(){
      $dvp = User::where('kelas_jabatan','>',8)->where('kelas_jabatan','<',12)->get();
      return view('admin.goalsetting.dvp',compact('dvp'));
    }

    public function dvp_detail($id){
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $user = User::find($id);
      $divisi = $user->divisi;
      $sub_divisi = $user->sub_divisi;
      $kelas_jabatan = $user->kelas_jabatan;
      $jabatan = $user->jabatan;
      $all = Task::all();
      $nipp = $user->nipp;
      $dvp = $user;
      $program_vp = Manajer::where('nipp_pj',$nipp)->where('status_proker','Sedang Diproses')->get();
      $semua_dpv = User::where('supervisor_nipp',$nipp)->get();
      $proker = Task::where('nipp',$nipp)->get();
      return view('admin.goalsetting.detail.dvp',compact(
        'now',
        'dvp',
        'divisi',
        'jabatan',
        'proker',
        'kelas_jabatan',
        'program_vp',
        'semua_dpv'
      ));
    }

    public function dvp_edit($id){
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $cari = Task::find($id);
      $user = User::where('nipp',$cari->nipp)->first();
      $divisi = $user->divisi;
      $sub_divisi = $user->sub_divisi;
      $kelas_jabatan = $user->kelas_jabatan;
      $jabatan = $user->jabatan;
      $nipp = $user->nipp;
      $program_vp = Manajer::where('nipp_pj',$nipp)->get();
      $semua_dpv = User::where('supervisor_nipp',$nipp)->get();
      $program = Task::find($id);
      return view('admin.goalsetting.edit.dvp', compact(
        'now',
        'user',
        'kelas_jabatan',
        'program',
        'program_vp'
      ));
    }

    public function dvp_log_index(){
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $alluser = User::where('kelas_jabatan','>',8)->where('kelas_jabatan','<',12)->get();
      $yangbelum = [];
      $yangsudah = [];
      foreach($alluser as $user){
        $checklogbook = Logbook::where('nipp', $user->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan', $now->month)->where('tahun',$now->year)->first();
        if(empty($checklogbook)){
          array_push($yangbelum, $user->nipp);
        }else{
          array_push($yangsudah, $user->nipp);
        }
      }
      return view('admin.log.dvp',compact('yangbelum','yangsudah'));
    }

    public function dvp_log_harian($id){
      $user = User::find($id);
      $today = Carbon::now()->format('Y-m-d');
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $find = Logbook::where('nipp',$user->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan',$now->month)->where('tahun',$now->year)->first();
      if(empty($find)){
        return redirect('home')->with('failed','Anda Belum mengisi logbook hari ini!');
      }
      switch($find->hari){
        case 1:
            $hari = "Senin";
            break;
        case 2:
            $hari = "Selasa";
            break;
        case 3:
            $hari = "Rabu";
            break;
        case 4:
            $hari = "Kamis";
            break;
        case 5:
            $hari = "Jumat";
            break;
        case 6:
            $hari = "Sabtu";
            break;
        default:
            $hari = "Minggu";
      }
      switch ($find->bulan) {
        case 2:
            $bulantahun = "Februari ".$find->tahun;
            break;
        case 3:
            $bulantahun = "Maret ".$find->tahun;
            break;
        case 4:
            $bulantahun = "April ".$find->tahun;
            break;
        case 5:
            $bulantahun = "Mei ".$find->tahun;
            break;
        case 6:
            $bulantahun = "Juni ".$find->tahun;
            break;
        case 7:
            $bulantahun = "Juli ".$find->tahun;
            break;
        case 8:
            $bulantahun = "Agustus ".$find->tahun;
            break;
        case 9:
            $bulantahun = "September ".$find->tahun;
            break;
        case 10:
            $bulantahun = "November ".$find->tahun;
            break;
        case 11:
            $bulantahun = "Desember ".$find->tahun;
            break;
        default:
            $bulantahun = "Januari";
      }
      $company = Company::find(1);
      // Fetch all customers from database
      $data = Logbook::where('nipp',$user->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan',$now->month)->where('tahun',$now->year)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.harian',compact('today','company','data','find','bulantahun','hari'));
    }

    public function dvp_log_mingguan($id){
      $user = User::find($id);
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $find = Logbook::where('nipp',$user->nipp)->where('minggu',$today->weekOfYear)->where('bulan',$today->month)->where('tahun',$today->year)->first();
      if(empty($find)){
        return redirect('home')->with('failed','Anda Belum mengisi logbook minggu ini!');
      }
      $list_hari = [
        '0'=>"Minggu",
        '1'=>"Senin",
        '2'=>"Selasa",
        '3'=>"Rabu",
        '4'=>"Kamis",
        '5'=>"Jumat",
        '6'=>"Sabtu",
      ];
      switch ($find->bulan) {
        case 2:
            $bulantahun = "Februari ".$find->tahun;
            break;
        case 3:
            $bulantahun = "Maret ".$find->tahun;
            break;
        case 4:
            $bulantahun = "April ".$find->tahun;
            break;
        case 5:
            $bulantahun = "Mei ".$find->tahun;
            break;
        case 6:
            $bulantahun = "Juni ".$find->tahun;
            break;
        case 7:
            $bulantahun = "Juli ".$find->tahun;
            break;
        case 8:
            $bulantahun = "Agustus ".$find->tahun;
            break;
        case 9:
            $bulantahun = "September ".$find->tahun;
            break;
        case 10:
            $bulantahun = "November ".$find->tahun;
            break;
        case 11:
            $bulantahun = "Desember ".$find->tahun;
            break;
        default:
            $bulantahun = "Januari";
      }
      // Fetch all customers from database
      $data = Logbook::where('nipp',$user->nipp)->where('minggu',$today->weekOfYear)->where('bulan',$today->month)->where('tahun',$today->year)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.mingguan',compact('today','company','data','find','bulantahun','list_hari'));
    }

    public function dvp_log_bulanan($id){
      $user = User::find($id);
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $find = Logbook::where('nipp',$user->nipp)->where('bulan',$today->month)->where('tahun', $today->year)->first();
      if(empty($find)){
        return redirect('home')->with('failed','Anda Belum mengisi logbook bulan ini!');
      }
      $list_hari = [
        '0'=>"Minggu",
        '1'=>"Senin",
        '2'=>"Selasa",
        '3'=>"Rabu",
        '4'=>"Kamis",
        '5'=>"Jumat",
        '6'=>"Sabtu",
      ];
      switch ($find->bulan) {
        case 2:
            $bulantahun = "Februari ".$find->tahun;
            break;
        case 3:
            $bulantahun = "Maret ".$find->tahun;
            break;
        case 4:
            $bulantahun = "April ".$find->tahun;
            break;
        case 5:
            $bulantahun = "Mei ".$find->tahun;
            break;
        case 6:
            $bulantahun = "Juni ".$find->tahun;
            break;
        case 7:
            $bulantahun = "Juli ".$find->tahun;
            break;
        case 8:
            $bulantahun = "Agustus ".$find->tahun;
            break;
        case 9:
            $bulantahun = "September ".$find->tahun;
            break;
        case 10:
            $bulantahun = "November ".$find->tahun;
            break;
        case 11:
            $bulantahun = "Desember ".$find->tahun;
            break;
        default:
            $bulantahun = "Januari";
      }
      // Fetch all customers from database
      $data = Logbook::where('nipp',$user->nipp)->where('bulan',$today->month)->where('tahun',$today->year)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.bulanan',compact('today','company','data','find','bulantahun','list_hari'));
    }

    public function officer_log_index(){
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $alluser = User::where('kelas_jabatan','>',12)->orWhere('kelas_jabatan','TNO')->get();
      $yangbelum = [];
      $yangsudah = [];
      foreach($alluser as $user){
        $checklogbook = Logbook::where('nipp', $user->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan', $now->month)->where('tahun',$now->year)->first();
        if(empty($checklogbook)){
          array_push($yangbelum, $user->nipp);
        }else{
          array_push($yangsudah, $user->nipp);
        }
      }
      return view('admin.log.officer',compact('yangbelum','yangsudah'));
    }

    public function officer_log_harian($id){
      $user = User::find($id);
      $today = Carbon::now()->format('Y-m-d');
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $find = Logbook::where('nipp',$user->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan',$now->month)->where('tahun',$now->year)->first();
      if(empty($find)){
        return redirect('home')->with('failed','Anda Belum mengisi logbook hari ini!');
      }
      switch($find->hari){
        case 1:
            $hari = "Senin";
            break;
        case 2:
            $hari = "Selasa";
            break;
        case 3:
            $hari = "Rabu";
            break;
        case 4:
            $hari = "Kamis";
            break;
        case 5:
            $hari = "Jumat";
            break;
        case 6:
            $hari = "Sabtu";
            break;
        default:
            $hari = "Minggu";
      }
      switch ($find->bulan) {
        case 2:
            $bulantahun = "Februari ".$find->tahun;
            break;
        case 3:
            $bulantahun = "Maret ".$find->tahun;
            break;
        case 4:
            $bulantahun = "April ".$find->tahun;
            break;
        case 5:
            $bulantahun = "Mei ".$find->tahun;
            break;
        case 6:
            $bulantahun = "Juni ".$find->tahun;
            break;
        case 7:
            $bulantahun = "Juli ".$find->tahun;
            break;
        case 8:
            $bulantahun = "Agustus ".$find->tahun;
            break;
        case 9:
            $bulantahun = "September ".$find->tahun;
            break;
        case 10:
            $bulantahun = "November ".$find->tahun;
            break;
        case 11:
            $bulantahun = "Desember ".$find->tahun;
            break;
        default:
            $bulantahun = "Januari";
      }
      $company = Company::find(1);
      // Fetch all customers from database
      $data = Logbook::where('nipp',$user->nipp)->where('hari',$now->dayOfWeek)->where('minggu',$now->weekOfYear)->where('bulan',$now->month)->where('tahun',$now->year)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.harian',compact('today','company','data','find','bulantahun','hari'));
    }

    public function officer_log_mingguan($id){
      $user = User::find($id);
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $find = Logbook::where('nipp',$user->nipp)->where('minggu',$today->weekOfYear)->where('bulan',$today->month)->where('tahun',$today->year)->first();
      if(empty($find)){
        return redirect('home')->with('failed','Anda Belum mengisi logbook minggu ini!');
      }
      $list_hari = [
        '0'=>"Minggu",
        '1'=>"Senin",
        '2'=>"Selasa",
        '3'=>"Rabu",
        '4'=>"Kamis",
        '5'=>"Jumat",
        '6'=>"Sabtu",
      ];
      switch ($find->bulan) {
        case 2:
            $bulantahun = "Februari ".$find->tahun;
            break;
        case 3:
            $bulantahun = "Maret ".$find->tahun;
            break;
        case 4:
            $bulantahun = "April ".$find->tahun;
            break;
        case 5:
            $bulantahun = "Mei ".$find->tahun;
            break;
        case 6:
            $bulantahun = "Juni ".$find->tahun;
            break;
        case 7:
            $bulantahun = "Juli ".$find->tahun;
            break;
        case 8:
            $bulantahun = "Agustus ".$find->tahun;
            break;
        case 9:
            $bulantahun = "September ".$find->tahun;
            break;
        case 10:
            $bulantahun = "November ".$find->tahun;
            break;
        case 11:
            $bulantahun = "Desember ".$find->tahun;
            break;
        default:
            $bulantahun = "Januari";
      }
      // Fetch all customers from database
      $data = Logbook::where('nipp',$user->nipp)->where('minggu',$today->weekOfYear)->where('bulan',$today->month)->where('tahun',$today->year)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.mingguan',compact('today','company','data','find','bulantahun','list_hari'));
    }

    public function officer_log_bulanan($id){
      $user = User::find($id);
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $find = Logbook::where('nipp',$user->nipp)->where('bulan',$today->month)->where('tahun', $today->year)->first();
      if(empty($find)){
        return redirect('home')->with('failed','Anda Belum mengisi logbook bulan ini!');
      }
      $list_hari = [
        '0'=>"Minggu",
        '1'=>"Senin",
        '2'=>"Selasa",
        '3'=>"Rabu",
        '4'=>"Kamis",
        '5'=>"Jumat",
        '6'=>"Sabtu",
      ];
      switch ($find->bulan) {
        case 2:
            $bulantahun = "Februari ".$find->tahun;
            break;
        case 3:
            $bulantahun = "Maret ".$find->tahun;
            break;
        case 4:
            $bulantahun = "April ".$find->tahun;
            break;
        case 5:
            $bulantahun = "Mei ".$find->tahun;
            break;
        case 6:
            $bulantahun = "Juni ".$find->tahun;
            break;
        case 7:
            $bulantahun = "Juli ".$find->tahun;
            break;
        case 8:
            $bulantahun = "Agustus ".$find->tahun;
            break;
        case 9:
            $bulantahun = "September ".$find->tahun;
            break;
        case 10:
            $bulantahun = "November ".$find->tahun;
            break;
        case 11:
            $bulantahun = "Desember ".$find->tahun;
            break;
        default:
            $bulantahun = "Januari";
      }
      // Fetch all customers from database
      $data = Logbook::where('nipp',$user->nipp)->where('bulan',$today->month)->where('tahun',$today->year)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.bulanan',compact('today','company','data','find','bulantahun','list_hari'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
