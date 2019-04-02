<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perusahaan;
use App\Direksi;
use App\Task;
use App\User;
use App\Logbook;
use App\Divisi;
use App\Manajer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
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
      $visi_perusahaan = Perusahaan::where('misi',null)->paginate(10);
      $misi_perusahaan = Perusahaan::where('visi',null)->paginate(10);
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $divisi = Auth::user()->divisi;
      return view('pages.goalsetting.perusahaan',compact('visi_perusahaan','misi_perusahaan','divisi','kelas_jabatan'));
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
        $visimisi = Perusahaan::find($id);
        return view('pages.goalsetting.ubah.perusahaan',compact('visimisi'));
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
      if($request->visi == null){
        $request->validate([
        'misi'=>'required',
        'tahun'=> 'required|integer'
        ]);
        $misi = Perusahaan::find($id);
        $misi->misi = $request->get('misi');
        $misi->tahun = $request->get('tahun');
        $misi->save();
      }else{
        $request->validate([
        'visi'=>'required',
        'tahun'=> 'required|integer'
        ]);
        $visi = Perusahaan::find($id);
        $visi->visi = $request->get('visi');
        $visi->tahun = $request->get('tahun');
        $visi->save();
      };
      return redirect('perusahaan')->with('success', 'Visi / Misi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cari = Perusahaan::find($id);
      $cari->delete();
      return redirect('perusahaan')->with('success', 'Visi / Misi berhasil dihapus!');
    }
}
