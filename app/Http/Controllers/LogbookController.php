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
use App\Company;
use PDF;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
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
        return view('pages.default');
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
        $insert = new Logbook;
        $insert->nipp = Auth::user()->nipp;
        $insert->supervisor_nipp = Auth::user()->supervisor_nipp;
        $prokerkait = Manajer::find($request->id);
        $insert->program_kerja_terkait = $prokerkait->program_kerja;
        $insert->id_program_kerja_terkait = $request->id;
        $insert->target = $request->target;
        $insert->logbook = $request->log;
        $insert->status = $request->status;
        $insert->jam = $now->format('H:i:s');
        $insert->tanggal = $now->format('Y-m-d');
        $insert->hari = $now->dayOfWeek;
        $insert->minggu = $now->weekOfYear;
        $insert->bulan = $now->month;
        $insert->tahun = $now->year;
        $insert->save();

        return redirect('home')->with('success','Sukses Menambahkan Logbook Harian');
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

    public function export_harian(){
      $today = Carbon::now()->format('Y-m-d');
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $find = Logbook::where('nipp',Auth::user()->nipp)->where('hari',$now->dayOfWeek)->first();
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
      $data = Logbook::where('nipp',Auth::user()->nipp)->where('hari',$now->dayOfWeek)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.harian',compact('today','company','data','find','bulantahun','hari'));
    }

    public function export_mingguan(){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $list_hari = [
        '0'=>"Minggu",
        '1'=>"Senin",
        '2'=>"Selasa",
        '3'=>"Rabu",
        '4'=>"Kamis",
        '5'=>"Jumat",
        '6'=>"Sabtu",
      ];
      $find = Logbook::where('nipp',Auth::user()->nipp)->where('minggu',$today->weekOfYear)->first();
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
      $data = Logbook::where('nipp',Auth::user()->nipp)->where('minggu',$today->weekOfYear)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.mingguan',compact('today','company','data','find','bulantahun','list_hari'));
    }

    public function export_bulanan(){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $find = Logbook::where('nipp',Auth::user()->nipp)->where('bulan',$today->month)->first();
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
      $data = Logbook::where('nipp',Auth::user()->nipp)->where('bulan',$today->month)->get();
      // Finally, you can download the file using download function
      return view('logbook.coachee.bulanan',compact('today','company','data','find','bulantahun','list_hari'));
    }

    public function export_harian_coachee($id){
      $today = Carbon::now()->format('Y-m-d');
      $now = Carbon::now()->setTimezone('Asia/Jakarta');
      $user = User::find($id);
      $find = Logbook::where('nipp',$user->nipp)->where('hari',$now->dayOfWeek)->first();
      if(empty($find)){
        return redirect('home')->with('failed','DVP / Officer Anda Belum mengisi logbook hari ini!');
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
      $data = Logbook::where('nipp',$user->nipp)->where('hari',$now->dayOfWeek)->get();
      // Finally, you can download the file using download function
      return view('logbook.coach.harian',compact('today','company','data','find','bulantahun','hari','user'));
    }

    public function export_mingguan_coachee($id){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $user = User::find($id);
      $list_hari = [
        '0'=>"Minggu",
        '1'=>"Senin",
        '2'=>"Selasa",
        '3'=>"Rabu",
        '4'=>"Kamis",
        '5'=>"Jumat",
        '6'=>"Sabtu",
      ];
      $find = Logbook::where('nipp',$user->nipp)->where('minggu',$today->weekOfYear)->first();
      if(empty($find)){
        return redirect('home')->with('failed','DVP / Officer anda belum mengisi log pada minggu ini');
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
      // Fetch all customers from database
      $data = Logbook::where('nipp',$user->nipp)->where('minggu',$today->weekOfYear)->get();
      // Finally, you can download the file using download function
      return view('logbook.coach.mingguan',compact('today','company','data','find','bulantahun','list_hari','user'));
    }

    public function export_bulanan_coachee($id){
      $today = Carbon::now()->setTimezone('Asia/Jakarta');
      $company = Company::find(1);
      $user = User::find($id);
      $find = Logbook::where('nipp',$user->nipp)->where('bulan',$today->month)->first();
      if(empty($find)){
        return redirect('home')->with('failed','DVP / Officer anda belum mengisi log pada bulan ini');
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
      $data = Logbook::where('nipp',$user->nipp)->where('bulan',$today->month)->get();
      // Finally, you can download the file using download function
      return view('logbook.coach.bulanan',compact('today','company','data','find','bulantahun','user','list_hari'));
    }
}
