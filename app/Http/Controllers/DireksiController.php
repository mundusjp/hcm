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

class DireksiController extends Controller
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
      $nipp = Auth::user()->nipp;
      $nama = Auth::user()->nama;
      $divisi = Auth::user()->divisi;
      $jabatan = Auth::user()->jabatan;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $seluruh_direksi = User::where('kelas_jabatan','<=','5')->where('supervisor_nipp','277056896')->get();
      $seluruh_divisi = Divisi::all();
      $direksi = Direksi::where('divisi',$divisi)->get();
      $program_direksi_utama = Direksi::where('divisi','Utama')->get();
      return view('pages.goalsetting.direksi',compact(
        'now',
        'nipp',
        'nama',
        'divisi',
        'direksi',
        'program_direksi_utama',
        'kelas_jabatan',
        'jabatan',
        'seluruh_direksi',
        'seluruh_divisi'
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
      $nipp = Auth::user()->nipp;
      $tambah_proker = new Direksi;
      $tambah_proker->nipp = $request->nipp;
      $tambah_proker->program_kerja = $request->proker;
      $tambah_proker->divisi = $request->divisi;
      $tambah_proker->mulai = $request->from;
      $tambah_proker->berakhir = $request->to;
      $tambah_proker->save();
      return redirect('direksi')->with('success','Sukses menambah Program Direksi!');
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
      $program = Direksi::find($id);
      return view('pages.goalsetting.ubah.direksi',compact('program'));
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
      Direksi::where('id',$request->id)->update([
        'program_kerja'=>$request->proker,
        'mulai'=>$request->from,
        'berakhir'=>$request->to
      ]);
      return redirect('direksi')->with('success','Sukses mengubah Program Direksi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cari = Direksi::find($id);
      $cari->delete();
      return redirect('direksi')->with('success', 'Program Direksi Berhasil Dihapus!');
    }

    public function get_divisi(Request $request)
    {
      $divisi = User::where('nipp',$request->nipp)->first();
      return $divisi->divisi;
    }
}
