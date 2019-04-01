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


class GoalsettingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  //PERUSAHAAN//
  public function index_perusahaan(){
    $visi_perusahaan = Perusahaan::where('misi',null)->get();
    $misi_perusahaan = Perusahaan::where('visi',null)->get();
    $kelas_jabatan = Auth::user()->kelas_jabatan;
    $divisi = Auth::user()->divisi;
    return view('pages.goalsetting.perusahaan',compact('visi_perusahaan','misi_perusahaan','divisi','kelas_jabatan'));
  }

  public function insert_visi_perusahaan(Request $request){
    $visi_perusahaan = Perusahaan::where('misi',null)->get();
    $misi_perusahaan = Perusahaan::where('visi',null)->get();
    if(empty($request->misi)){
      $tambah_visi = new Perusahaan;
      $tambah_visi->visi = $request->visi;
      $tambah_visi->tahun = $request->tahun;
      $tambah_visi->save();
      session()->flash('success', 'Sukses Menambahkan Visi Perusahaan');
    }else{
      $tambah_misi = new Perusahaan;
      $tambah_misi->misi = $request->misi;
      $tambah_misi->tahun = $request->tahun;
      $tambah_misi->save();
      session()->flash('success', 'Sukses Menambahkan Misi Perusahaan');
    };
    return redirect('perusahaan');
  }

  public function edit_visi_perusahaan(){
    return view('pages.goalsetting.perusahaan');
  }

  public function update_visi_perusahaan(){
    return view('pages.goalsetting.perusahaan');
  }

  public function delete_visi_perusahaan(Request $request){
    $id = $request->id;
    $cari = Perusahaan::find($id);
    $cari->delete();

    return redirect('perusahaan')->with('success', 'Visi / Misi berhasil dihapus!');
  }

// -------------------------------------------------------------------------------
  //DIREKSI//
  public function index_direksi(){
    $nipp = Auth::user()->nipp;
    $nama = Auth::user()->nama;
    $divisi = Auth::user()->divisi;
    $jabatan = Auth::user()->jabatan;
    $kelas_jabatan = Auth::user()->kelas_jabatan;
    $direksi = Direksi::where('divisi',$divisi)->get();
    $program_direksi_utama = Direksi::where('divisi','Utama')->get();
    return view('pages.goalsetting.direksi',compact('nipp','nama','divisi','direksi','program_direksi_utama','kelas_jabatan','jabatan'));
  }

  public function insert_misi_direksi(Request $request){
    $nipp = Auth::user()->nipp;
    $tambah_proker = new Direksi;
    $tambah_proker->nipp = $request->nipp;
    $tambah_proker->program_kerja = $request->proker;
    $tambah_proker->divisi = $request->divisi;
    $tambah_proker->mulai = $request->from;
    $tambah_proker->berakhir = $request->to;
    $tambah_proker->save();
    return redirect('direksi');
  }

  public function edit_misi_direksi(Request $req){
    $nipp = Auth::user()->nipp;
    $program = Direksi::where('nipp',$nipp)->where('id',$req->id)->first();
    return view('pages.goalsetting.ubah.direksi',compact('program'));
  }

  public function update_misi_direksi(Request $req){
    $nipp = Auth::user()->nipp;
    Direksi::where('nipp',$nipp)->where('id',$req->id)->update([
      'program_kerja'=>$req->proker,
      'mulai'=>$req->from,
      'berakhir'=>$req->to
    ]);
    return redirect('direksi')->with('success','Sukses mengubah Program Direksi!');
  }

  public function delete_misi_direksi(Request $request){
    $id = $request->id;
    $cari = Direksi::find($id);
    $cari->delete();

    return redirect('direksi')->with('success', 'Program Direksi Berhasil Dihapus!');
  }

  // -------------------------------------------------------------------------------
    //MANAJER//
    public function index_manajer(){
      $nama = Auth::user()->nama;
      $nipp = Auth::user()->nipp;
      $divisi = Auth::user()->divisi;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $jabatan = Auth::user()->jabatan;
      $now = Carbon::now();
      $start = Carbon::now()->subDays(7);
      $direksi = Direksi::where('divisi',$divisi)->get();
      $proker = Manajer::where('nipp',$nipp)->get();
      return view('pages.goalsetting.manajer',compact('divisi','jabatan','nama','nipp','kelas_jabatan','proker','now','direksi'));
    }

    public function insert_misi_manajer(Request $request){
      $insert = new Manajer;
      $insert->nipp = $request->nipp;
      $insert->program_kerja = $request->proker;
      $insert->divisi = $request->divisi;
      $insert->mulai = $request->from;
      $insert->berakhir = $request->to;
      $insert->minggu_ke = $request->minggu;
      $insert->save();
      return redirect('manajer')->with('success', 'Program Vice President Berhasil Ditambahkan!');
    }

    public function edit_misi_manajer(Request $req){
      $nipp = Auth::user()->nipp;
      $program = Manajer::where('nipp',$nipp)->where('id',$req->id)->first();
      return view('pages.goalsetting.ubah.manajer',compact('program'));
    }

    public function update_misi_manajer(Request $req){
      $nipp = Auth::user()->nipp;
      Manajer::where('nipp',$nipp)->where('id',$req->id)->update([
        'program_kerja'=>$req->proker,
        'mulai'=>$req->from,
        'berakhir'=>$req->to
      ]);
      return redirect('manajer')->with('success','Sukses mengubah Program Vice President!');
    }

    public function delete_misi_manajer(Request $req){
      Manajer::where('id',$req->id)->delete();
      return redirect('manajer')->with('success', 'Program Vice President Berhasil Dihapuskan!');
    }

// -------------------------------------------------------------------------------
  //SUPERVISOR//
  public function index_supervisor(){
    $divisi = Auth::user()->divisi;
    $kelas_jabatan = Auth::user()->kelas_jabatan;
    $jabatan = Auth::user()->jabatan;
    $nipp = Auth::user()->nipp;
    $manajer = Manajer::where('divisi',$divisi)->get();
    $tugas = Task::where('nipp',$nipp)->get();
    return view('pages.goalsetting.supervisor',compact('divisi','jabatan','tugas','kelas_jabatan','manajer'));
  }

  public function insert_misi_supervisor(){
    return view('pages.goalsetting.supervisor');
  }

  public function edit_misi_supervisor(){
    return view('pages.goalsetting.supervisor');
  }

  public function update_misi_supervisor(){
    return view('pages.goalsetting.supervisor');
  }

  public function delete_misi_supervisor(){
    return view('pages.goalsetting.supervisor');
  }
  // -------------------------------------------------------------------------------
    //GOALMATCHING//

  public function goal_matching(){
    $nipp = Auth::user()->nipp;
    $officer = User::where('supervisor_nipp',$nipp)->get();
    return view('pages.goalmatching',compact('officer'));
  }
}
