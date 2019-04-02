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
      $start = Carbon::now()->subDays(7);
      $direksi = Direksi::where('divisi',$divisi)->get();
      $proker_tahunan = Manajer::where('nipp',$nipp)->where('kategori','Tahunan')->get();
      $proker_settahunan = Manajer::where('nipp',$nipp)->where('kategori','1/2 Tahunan')->get();
      $proker_bulanan = Manajer::where('nipp',$nipp)->where('kategori','Bulanan')->get();
      return view('pages.goalsetting.manajer',compact('divisi','jabatan','nama','nipp','kelas_jabatan','now','direksi','proker_bulanan','proker_settahunan','proker_tahunan'));
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
      $insert->status_proker = "Belum Diproses";

      if($request->kategori == 1){ // mingguan
        $insert->minggu = $now->weekOfYear;
        if($now->weekOfYear%4 == 0){
          if($now->weekOfYear == 52){
            $insert->bulan = ($now->month + 1)%12;
          }else{
            $insert->bulan = $now->month + 1;
          };
        }else{
          $insert->bulan = $now->month;
        };
        if($now->month + 1 == 13){
          $insert->tahun = $now->year + 1;
        }else{
          $insert->tahun = $now->year;
        };
        $insert->kategori = "Mingguan";
      }elseif($request->kategori == 2){ //bulanan
        $minggu = ($now->weekOfYear + 4)%52;
        $insert->minggu = $minggu;
        $insert->bulan = $now->month + 1;
        if($now->month == 12){
          $insert->tahun = $now->year + 1;
        }else{
          $insert->tahun = $now->year;
        };
        $insert->kategori = "Bulanan";
      }elseif($request->kategori == 3){ //1/2 tahunan
        $insert->kategori = "1/2 Tahunan";
        $insert->minggu = ($now->weekOfYear+26)%52;
        $insert->bulan = ($now->month + 6)%12;
        if($now->month >=7){
          $insert->tahun = $now->year+1;
        }else{
          $insert->tahun = $now->year;
        };
      }else{ // tahunan
        $insert->minggu = $now->weekOfYear;
        $insert->bulan = $now->month;
        $insert->tahun = $now->year+1;
        $insert->kategori = "Tahunan";
      };
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
          'berakhir'=>$request->to
        ]);
      }else{
        Manajer::where('id',$id)->update([
          'program_direksi'=>$prodir->program_kerja,
          'id_prodir'=>$id1,
          'program_kerja'=>$request->proker,
          'mulai'=>$request->from,
          'berakhir'=>$request->to
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
}
