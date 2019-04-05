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
        //
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
        $insert = new Logbook;
        $insert->nipp = Auth::user()->nipp;
        $insert->supervisor_nipp = Auth::user()->supervisor_nipp;
        $prokerkait = Manajer::find($request->id);
        $insert->program_kerja_terkait = $prokerkait->program_kerja;
        $insert->id_program_kerja_terkait = $request->id;
        $insert->target = $request->target;
        $insert->logbook = $request->log;
        $insert->status = $request->status;
        $insert->tanggal = $now->format('Y-m-d');
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
      $company = Company::find(1);
      // Fetch all customers from database
      $data = Logbook::where('nipp',Auth::user()->nipp)->where('tanggal',$today)->get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('logbook_harian', compact('data','company'));
      // Finally, you can download the file using download function
      return $pdf->download('logbook-harian-'.Auth::user()->nipp.'.pdf');
    }

    public function export_mingguan(){
      $today = Carbon::now();
      $company = Company::find(1);
      // Fetch all customers from database
      $data = Logbook::where('nipp',Auth::user()->nipp)->where('minggu',$today->weekOfYear)->get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('logbook_mingguan', compact('data','company'));
      // Finally, you can download the file using download function
      return $pdf->download('logbook-mingguan-'.Auth::user()->nipp.'.pdf');
    }

    public function logbook_harian(){
      $today = Carbon::now()->format('Y-m-d');
      $company = Company::find(1);
      $data = Logbook::where('nipp',Auth::user()->nipp)->where('tanggal',$today)->get();
      return view('logbook_harian',compact('today','company','data'));
    }
}
