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
use Illuminate\Support\Facades\Auth;

class DVPController extends Controller
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
      $now = Carbon::now();
      $now->setTimezone('Asia/Jakarta');
      $divisi = Auth::user()->divisi;
      $sub_divisi = Auth::user()->sub_divisi;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $jabatan = Auth::user()->jabatan;
      $all = Task::all();
      // foreach($all as $program){
      //   if($program->progres != 0 || $program->progres != 100 ){
      //     Task::where('id',$program->id)->update([
      //       'status_task'=>"Sedang Diproses"
      //     ]);
      //   }elseif($program->progres == 100){
      //     Task::where('id',$program->id)->update([
      //       'status_task'=>"Selesai"
      //     ]);
      //   };
      // }
      $nipp = Auth::user()->nipp;
      $program_vp = Manajer::where('nipp_pj',$nipp)->where('status_proker','Sedang Diproses')->get();
      $semua_dpv = User::where('supervisor_nipp',$nipp)->get();
      $tugas = Task::where('nipp',$nipp)->get();
      return view('pages.goalsetting.supervisor',compact(
        'now',
        'divisi',
        'jabatan',
        'tugas',
        'kelas_jabatan',
        'program_vp',
        'semua_dpv'
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
      $insert = new Task;
      $insert->nipp = $request->nipp;
      $id1 = $request->program_vp;
      $program_vp = Manajer::where('id',$id1)->first();
      $insert->id_provp = $request->program_vp;
      $insert->program_vp = $program_vp->program_kerja;
      $insert->program_kerja = $request->proker;
      $insert->sub_divisi = Auth::user()->sub_divisi;
      $insert->sub_subdivisi = Auth::user()->sub_subdivisi;
      $insert->mulai = $request->from;
      $insert->berakhir = $request->to;
      $insert->status_task = "Belum Disampaikan";
      $insert->due_date = $request->to;
      $insert->keterangan = "Task belum diberikan kepada officer terkait";
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
      return redirect('deputy-vice-president')->with('success', 'Program Deputy Vice President Berhasil Ditambahkan!');
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
      $now = Carbon::now();
      $now->setTimezone('Asia/Jakarta');
      $divisi = Auth::user()->divisi;
      $sub_divisi = Auth::user()->sub_divisi;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $jabatan = Auth::user()->jabatan;
      $nipp = Auth::user()->nipp;
      $program_vp = Manajer::where('nipp_pj',$nipp)->get();
      $semua_dpv = User::where('supervisor_nipp',$nipp)->get();
      $program = Task::find($id);
      return view('pages.goalsetting.ubah.supervisor', compact(
        'now',
        'kelas_jabatan',
        'program',
        'program_vp'
      ));
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
      $date = Carbon::createFromFormat('Y-m-d', $request->to);
      $now = Carbon::now();
      $now->setTimezone('Asia/Jakarta');
      $start_date = Carbon::createFromFormat('Y-m-d', $request->from);
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
      $hari = $date->dayOfWeek;
      $bulan = $start_date->month;
      $tahun = $start_date->year;
      Task::where('id',$id)->update([
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
      return redirect('deputy-vice-president')->with('success','Sukses mengubah Program Deputy Vice President!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cari = Task::find($id);
      $cari->delete();
      return redirect('deputy-vice-president')->with('success', 'Program Deputy Vice President Berhasil Dihapuskan!');
    }
    public function proses($id){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      Manajer::where('id',$id)->update([
        'status_proker'=>"Sedang Diproses",
        'keterangan'=>"Tugas mulai diproses pada ".$today
      ]);
        return redirect('home')->with('success','Sukses Memproses Tugas VP');
    }
    public function selesai_page($id){
      $program = Manajer::find($id);
      return view('pages.dashboard.selesai.vp', compact('program'));
    }

    public function batal_selesai($id){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      Manajer::where('id',$id)->update([
        'status_proker'=>"Konfirmasi Dibatalkan",
        'keterangan'=>"Konfirmasi Selesai dibatalkan pada ".$today
      ]);
        return redirect('home')->with('success','Sukses Membatalkan Selesai Tugas VP');
    }

    public function selesai(Request $request,$id){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      Manajer::where('id',$id)->update([
        'status_proker'=>"Konfirmasi Selesai",
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Request Konfirmasi Penyelesaian Tugas!');
    }

    public function tunda_page($id){
      $program = Manajer::find($id);
      return view('pages.dashboard.tunda.vp', compact('program'));
    }

    public function tunda_task(Request $request, $id){
      Manajer::where('id',$id)->update([
        'status_proker'=>"Ditunda",
        'due_date'=>$request->due_date,
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Menunda Tugas VP dan diberikan keterangan!');
    }

    public function assign_task(Request $request)
    {
      $program = Task::where('id',$request->id)->first();
      if(!empty($program->id_prokerkait)){
        Task::where('id', $program->id_prokerkait)->update([
          'status_task'=>"Sedang Diproses"
        ]);
      };
      Task::where('id',$request->id)->update([
        'target'=>$request->target,
        'nipp_pj'=>$request->nipp_pj,
        'status_task'=>"Belum Direspon",
        'keterangan'=>"Proker Belum Direspon oleh Officer Terkait"
      ]);
      return redirect('home')->with('success','Sukses Memberikan Tugas ke Officer!');
    }

    public function konfirmasi($id){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $program = Task::find($id);
      if(!empty($program->id_prokerkait)){
      $program_terkait = Task::find($program->id_prokerkait);
      $program_vp_terkait = Manajer::find($program_terkait->id_provp);
        $progres = $program_terkait->progres + $program->bobot;
        if($progres == 100){
          Task::where('id',$program->id_prokerkait)->update([
            'progres' => $progres,
            'status_task'=> "Selesai",
            'keterangan'=>"Program Kerja sudah selesai pada ".$today,
            'selesai_pada'=>$today
          ]);
        }else{
          Task::where('id',$program->id_prokerkait)->update([
            'progres' => $progres,
            'keterangan'=>"Update progres pada ".$today,
          ]);
        };
        Task::where('id',$id)->update([
          'status_task'=>"Selesai",
          'keterangan'=>"Tugas sudah selesai dan dikonfirmasi pada ".$today,
          'selesai_pada'=>$today,
        ]);
        if($program_terkait->status_proker == "Selesai"){
          $progres = $program_vp_terkait->progres + $program_terkait->bobot;
          if($progres == 100){
            Manajer::where('id',$program_terkait->id_provp)->update([
              'progres' => $progres,
              'status_proker'=> "Selesai",
              'keterangan'=>"Program Kerja sudah selesai pada ".$today,
              'selesai_pada'=>$today
            ]);
          }else{
            Manajer::where('id',$program_terkait->id_provp)->update([
              'progres' => $progres,
              'keterangan'=>"Update progres pada Sebesar".$program_terkait->bobot." pada ".$today,
            ]);
          };
        }
      }else{
        Task::where('id',$id)->update([
          'status_task'=>"Selesai",
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
      //   'minggu'=>$today->weekOfYear,
      //   'jumlah_task_sukses_minggu_ini'=>$update_performa_mingguan,
      //   'bulan'=>$today->month,
      //   'jumlah_task_sukses_bulan_ini'=>$update_performa_bulanan,
      //   'tahun'=>$today->year,
      //   'jumlah_task_sukses_tahun_ini'=>$update_performa_tahunan
      // ]);
      return redirect('home')->with('success','Sukses Mengkonfirmasi Tugas Officer!');
    }

    public function reject_page($id){
      $program = Task::find($id);
      return view('pages.dashboard.reject.dvp', compact('program'));
    }
    public function reject_task(Request $request, $id){
      Task::where('id',$id)->update([
        'status_task'=>"Ditolak",
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Menolak Tugas Officer dan diberikan keterangan!');
    }

    public function batalkan_page($id){
      $program = Task::find($id);
      return view('pages.dashboard.batalkan.dvp', compact('program'));
    }

    public function batalkan_task(Request $request, $id){
      Task::where('id',$id)->update([
        'status_task'=>"Dibatalkan",
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Membatalkan Tugas Officer dan diberikan keterangan!');
    }

    public function peringatkan_page($id){
      $program = Task::find($id);
      return view('pages.dashboard.peringatkan.dvp', compact('program'));
    }

    public function peringatkan_task(Request $request, $id){
      Task::where('id',$id)->update([
        'status_task'=>"Diperingatkan",
        'keterangan'=>$request->keterangan
      ]);
        return redirect('home')->with('success','Sukses Memperingatkan Tugas Officer dan diberikan keterangan!');
    }
}
