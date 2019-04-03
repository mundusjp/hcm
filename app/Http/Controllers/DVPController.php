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
      $divisi = Auth::user()->divisi;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $jabatan = Auth::user()->jabatan;
      $nipp = Auth::user()->nipp;
      $manajer = Manajer::where('divisi',$divisi)->get();
      $tugas = Task::where('nipp',$nipp)->get();
      return view('pages.goalsetting.supervisor',compact('divisi','jabatan','tugas','kelas_jabatan','manajer'));
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
      $insert->nipp = $request->nipp;
      $id1 = $request->program_vp;
      $program_vp = Manajer::where('id',$id1)->first();
      $insert->id_provp = $request->program_vp;
      $insert->program_vp = $program_vp->program_kerja;
      if(!empty($request->program_kerja_terkait)){
      $id2 = $request->program_kerja_terkait;
      $prokerkait = Task::where('id',$id2)->first();
      $insert->program_kerja_terkait = $prokerkait->program_kerja;
      $insert->id_prokerkait = $request->program_kerja_terkait;
      }
      $insert->program_kerja = $request->proker;
      $insert->sub_divisi = Auth::user()->sub_divisi;
      $insert->sub_subdivisi = Auth::user()->sub_subdivisi;
      $insert->program_direksi = $prodir->program_kerja;
      $insert->mulai = $request->from;
      $insert->berakhir = $request->to;
      $insert->status_task = "Belum Disampaikan";
      $insert->due_date = $request->to;
      $insert->keterangan = "Task belum diberikan kepada officer terkait";
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
      };
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
