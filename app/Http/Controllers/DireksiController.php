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
      function update_status(){
        $all = Direksi::all();
        foreach($all as $program){
          if($program->status_proker == "Belum Diproses"){
            $check = Manajer::where('id_prodir', $program->id)->first();
            if(!empty($check)){
              Direksi::where('id',$program->id)->update(['status_proker'=>"Sedang Diproses"]);
            };
          };
        }
      }
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $nipp = Auth::user()->nipp;
      $nama = Auth::user()->nama;
      $divisi = Auth::user()->divisi;
      $jabatan = Auth::user()->jabatan;
      $kelas_jabatan = Auth::user()->kelas_jabatan;
      $seluruh_direksi = User::where('kelas_jabatan','<=','5')->where('supervisor_nipp','277056896')->get();
      $seluruh_divisi = Divisi::all();
      $direksi = Direksi::where('divisi',$divisi)->get();
      $program_direksi_utama = Direksi::where('divisi','Utama')->get();
      update_status();
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
      $tambah_proker = new Direksi;
      $tambah_proker->nipp = $request->nipp;
      $tambah_proker->program_kerja = $request->proker;
      $tambah_proker->divisi = $request->divisi;
      $tambah_proker->mulai = $request->from;
      if(Auth::user()->divisi == "Utama"){
        $tambah_proker->nipp_pj = $request->direksi;
      }
      $tambah_proker->berakhir = $request->to;
      $tambah_proker->tahun = Carbon::now()->year;
      $tambah_proker->progres = 0;
      $tambah_proker->status_proker = "Belum Direspon";
      $tambah_proker->save();
      $user = User::where('nipp',$request->nipp)->first();
      if(Auth::user()->kelas_jabatan == 1){
        return redirect(route('superadmin.direksi.detail',$user->id))->with('success','Sukses menambah Program Direksi!');
      }else{
        return redirect('direksi')->with('success','Sukses menambah Program Direksi!');
      };
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
      $nipp = Direksi::find($id);
      $user = User::where('nipp',$nipp->nipp)->first();
      Direksi::where('id',$request->id)->update([
        'program_kerja'=>$request->proker,
        'mulai'=>$request->from,
        'berakhir'=>$request->to
      ]);
      if(Auth::user()->kelas_jabatan == 1){
        return redirect(route('superadmin.direksi.detail',$user->id))->with('success','Sukses mengubah program direksi!');
      }else{
        return redirect('direksi')->with('success','Sukses mengubah Program Direksi!');
      };

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
      $user = User::where('nipp',$cari->nipp)->first();
      $cari->delete();
      if(Auth::user()->kelas_jabatan == 1){
        return redirect(route('superadmin.direksi.detail',$user->id))->with('success','Program Direksi Berhasil Dihapus!');
      }else{
        return redirect('direksi')->with('success','Program Direksi Berhasil Dihapus!');
      };
    }

    public function get_divisi(Request $request)
    {
      $divisi = User::where('nipp',$request->nipp)->first();
      return $divisi->divisi;
    }

    public function edit_target($id)
    {
      $program = Direksi::find($id);
      return view('pages.dashboard.ubah.target',compact('program'));
    }

    public function update_target(Request $request, $id)
    {
      Direksi::where('id',$id)->update([
        'target_bulanan'=> $request->target
      ]);
      return redirect('home')->with('success','Sukses Mengubah Target Program!');
    }
}
