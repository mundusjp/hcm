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

class OfficerController extends Controller
{
  public function proses($id){
    $today = Carbon::now()->setTimezone('Asia/Jakarta');
    Task::where('id',$id)->update([
      'status_task'=>"Sedang Diproses",
      'keterangan'=>"Tugas mulai diproses pada ".$today
    ]);
      return redirect('home')->with('success','Sukses Memproses Tugas DVP');
  }
  public function selesai_page($id){
    $program = Task::find($id);
    return view('pages.dashboard.selesai.dvp', compact('program'));
  }

  public function batal_selesai($id){
    $today = Carbon::now()->setTimezone('Asia/Jakarta');
    Task::where('id',$id)->update([
      'status_task'=>"Konfirmasi Dibatalkan",
      'keterangan'=>"Konfirmasi Selesai dibatalkan pada ".$today
    ]);
      return redirect('home')->with('success','Sukses Membatalkan Selesai Tugas DVP');
  }

  public function selesai(Request $request,$id){
    $today = Carbon::now()->setTimezone('Asia/Jakarta');
    Task::where('id',$id)->update([
      'status_task'=>"Konfirmasi Selesai",
      'keterangan'=>$request->keterangan
    ]);
      return redirect('home')->with('success','Sukses Request Konfirmasi Penyelesaian Tugas!');
  }

  public function tunda_page($id){
    $program = Task::find($id);
    return view('pages.dashboard.tunda.dvp', compact('program'));
  }

  public function tunda_task(Request $request, $id){
    Task::where('id',$id)->update([
      'status_task'=>"Ditunda",
      'due_date'=>$request->due_date,
      'keterangan'=>$request->keterangan
    ]);
      return redirect('home')->with('success','Sukses Menunda Tugas DVP dan diberikan keterangan!');
  }
}
