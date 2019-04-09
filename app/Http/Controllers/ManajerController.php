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
      $all = Manajer::all();
      $now->setTimezone('Asia/Jakarta');
      $all_vp = User::where('kelas_jabatan','<=','8')->get();
      $vp = User::where('supervisor_nipp',$nipp)->where('kelas_jabatan','<=','8')->where('kelas_jabatan','>=','6')->get();
      $direksi = Direksi::where('divisi',$divisi)->get();
      $assigned_tasks = Manajer::whereNotNull('nipp_pj')->get();
      $proker_mingguan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','Mingguan')->paginate(10);
      $proker_tahunan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','Tahunan')->paginate(10);
      $proker_settahunan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','1/2 Tahunan')->paginate(10);
      $proker_bulanan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','Bulanan')->paginate(10);
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
        'proker_mingguan',
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
      $now->setTimezone('Asia/Jakarta');
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
      $start_date = Carbon::createFromFormat('Y-m-d', $request->from);
      $date = Carbon::createFromFormat('Y-m-d', $request->to);
      $diff_between_dates = $date->diffInDays($start_date);
      if(($date->day == 31 && $date->month == 12)||$diff_between_dates > 185){
        $insert->minggu = 52;
        $insert->kategori = "Tahunan";
      }elseif($diff_between_dates <= 185 && $diff_between_dates >= 180){
        $insert->minggu = $date->weekOfYear;
        $insert->kategori = "1/2 Tahunan";
      }elseif($diff_between_dates < 180 && $diff_between_dates > 28 ){
        $insert->minggu = $date->weekOfYear;
        $insert->kategori = "Bulanan";
      }else{
        $insert->minggu = $date->weekOfYear;
        $insert->kategori = "Mingguan";
      }
      $insert->hari = $date->dayOfWeek;
      $insert->bulan = $start_date->month;
      $insert->tahun = $start_date->year;
      $insert->bobot = $request->bobot;
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
      $now->setTimezone('Asia/Jakarta');
      $direksi = Direksi::where('divisi',$divisi)->get();
      $proker_mingguan = Manajer::where('sub_divisi',Auth::user()->sub_divisi)->where('kategori','Mingguan')->where('minggu',$now->weekOfYear)->get();
      $proker_tahunan = Manajer::where('nipp',$nipp)->where('kategori','Tahunan')->where('tahun',$now->year)->get();
      $proker_settahunan = Manajer::where('nipp',$nipp)->where('kategori','1/2 Tahunan')->where('tahun',$now->year)->get();
      $proker_bulanan = Manajer::where('nipp',$nipp)->where('kategori','Bulanan')->where('bulan',$now->month)->get();
      $program = Manajer::find($id);
      return view('pages.goalsetting.ubah.manajer',compact('program','divisi','jabatan','nama','nipp','kelas_jabatan','now','direksi','proker_mingguan','proker_bulanan','proker_settahunan','proker_tahunan'));
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
      $now->setTimezone('Asia/Jakarta');
      $insert = new Manajer;
      $start_date = Carbon::createFromFormat('Y-m-d', $request->from);
      $diff_between_dates = $date->diffInDays($start_date);
      if(($date->day == 31 && $date->month == 12)||$diff_between_dates > 185){
        $minggu = '52';
        $kategori = "Tahunan";
      }elseif($diff_between_dates <= 185 && $diff_between_dates >= 180){
        $minggu = $date->weekOfYear;
        $kategori = "1/2 Tahunan";
      }elseif($diff_between_dates < 180 && $diff_between_dates > 28 ){
        $minggu = $date->weekOfYear;
        $kategori = "Bulanan";
      }else{
        $minggu = $date->weekOfYear;
        $kategori = "Mingguan";
      }
      $hari = $date->dayOfWeek;
      $bulan = $start_date->month;
      $tahun = $start_date->year;
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
          'hari'=> $hari,
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
          'hari'=> $hari,
          'minggu'=> $minggu,
          'bulan'=> $bulan,
          'tahun'=> $tahun,
          'due_date'=>$request->to,
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
      $program = Manajer::where('id',$request->id)->first();
      if(!empty($program->id_prokerkait)){
        Manajer::where('id', $program->id_prokerkait)->update([
          'status_proker'=>"Sedang Diproses"
        ]);
      };
      Manajer::where('id',$request->id)->update([
        'target'=>$request->target,
        'nipp_pj'=>$request->nipp_pj,
        'status_proker'=>"Belum Direspon",
        'keterangan'=>"Proker Belum Direspon oleh DVP Terkait"
      ]);
      return redirect('home')->with('success','Sukses Memberikan Tugas ke DVP!');
    }

    public function konfirmasi($id){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $program = Manajer::find($id);
      if(!empty($program->id_prokerkait)){
      $program_terkait = Manajer::find($program->id_prokerkait);
      $program_direksi_terkait = Direksi::find($program_terkait->id_prodir);
        $progres = $program_terkait->progres + $program->bobot;
        Manajer::where('id',$id)->update(['progres'=>$program->bobot]);
        if($progres == 100){
          Manajer::where('id',$program->id_prokerkait)->update([
            'progres' => $progres,
            'status_proker'=> "Selesai",
            'keterangan'=>"Program Kerja sudah selesai pada ".$today,
            'selesai_pada'=>$today
          ]);
        }else{
          Manajer::where('id',$program->id_prokerkait)->update([
            'progres' => $progres,
            'keterangan'=>"Update progres pada ".$today,
          ]);
        };
        Manajer::where('id',$id)->update([
          'status_proker'=>"Selesai",
          'keterangan'=>"Tugas sudah selesai dan dikonfirmasi pada ".$today,
          'selesai_pada'=>$today,
        ]);
        if($program_terkait->status_proker == "Selesai"){
          $progres = $program_direksi_terkait->progres + $program_terkait->bobot;
          if($progres == 100){
            Direksi::where('id',$program_terkait->id_prodir)->update([
              'progres' => $progres,
              'status_proker'=> "Selesai",
              'keterangan'=>"Program Kerja sudah selesai pada ".$today,
              'selesai_pada'=>$today
            ]);
          }else{
            Direksi::where('id',$program_terkait->id_prodir)->update([
              'progres' => $progres,
              'keterangan'=>"Update progres pada Sebesar".$program_terkait->bobot." pada ".$today,
            ]);
          };
        }
      }else{
        Manajer::where('id',$id)->update([
          'status_proker'=>"Selesai",
          'keterangan'=>"Tugas sudah selesai dan dikonfirmasi pada ".$today,
          'progres'=>"100",
          'selesai_pada'=>$today,
        ]);
      };
      $performa = Performa::where('nipp',$program->nipp_pj)->first();
      if(empty($performa)){
        $insert = new Performa;
        $insert->nipp = $program->nipp_pj;
        $insert->supervisor_nipp = Auth::user()->nipp;
        $insert->save();
      };
      // $update_performa_mingguan = $performa->jumlah_task_sukses_minggu_ini + 1;
      // $update_performa_bulanan = $performa->jumlah_task_sukses_bulan_ini + 1;
      // $update_performa_tahunan = $performa->jumlah_task_sukses_tahun_ini + 1;
      // Performa::where('nipp',$program->nipp_pj)->update([
      //   'jumlah_task_sukses_minggu_ini'=>$update_performa_mingguan,
      //   'jumlah_task_sukses_bulan_ini'=>$update_performa_bulanan,
      //   'jumlah_task_sukses_tahun_ini'=>$update_performa_tahunan
      // ]);
      return redirect('home')->with('success','Sukses Mengkonfirmasi Tugas DVP!');
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
      if($request->kurangi == "yes"){
        $now = Carbon::now()->setTimezone('Asia/Jakarta');
        $program = Manajer::find($id);
        $user = Performa::where('nipp',$program->nipp_pj)->first();
        $jumlah_task_gagal_minggu_ini = $user->jumlah_task_gagal_minggu_ini + 1;
        $jumlah_task_gagal_bulan_ini = $user->jumlah_task_gagal_bulan_ini + 1;
        $jumlah_task_gagal_tahun_ini = $user->jumlah_task_gagal_tahun_ini + 1;
        Performa::where('nipp',$program->nipp_pj)->update([
          'jumlah_task_gagal_minggu_ini'=>$jumlah_task_gagal_minggu_ini,
          'minggu'=>$now->weekOfYear,
          'jumlah_task_gagal_bulan_ini'=>$jumlah_task_gagal_bulan_ini,
          'bulan'=>$now->month,
          'jumlah_task_gagal_tahun_ini'=>$jumlah_task_gagal_tahun_ini,
          'tahun'=>$now->year,
        ]);
      };
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
