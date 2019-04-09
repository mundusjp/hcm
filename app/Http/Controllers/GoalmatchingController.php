<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direksi;
use App\User;
use App\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GoalmatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $now = Carbon::now();
      $now->setTimezone('Asia/Jakarta');
      $officer = User::where('supervisor_nipp',Auth::user()->nipp)->get();
      return view('pages.goalmatching.goalmatching', compact('now','officer'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_evaluasi()
    {
      $now = Carbon::now();
      $start = Carbon::now()->subDays(7);
      $officer = User::where('supervisor_nipp',Auth::user()->nipp)->get();
      return view('pages.goalmatching.evaluasi', compact('now','officer'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_coach()
    {
      $now = Carbon::now();
      $start = Carbon::now()->subDays(7);
      $officer = User::where('supervisor_nipp',Auth::user()->nipp)->get();
      $pertanyaan = Pertanyaan::where('kategori','Coach')->get();
      return view('pages.goalmatching.coach', compact('now','officer','pertanyaan'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_coachee()
    {
      if(Auth::user()->kelas_jabatan <=8 && Auth::user()->kelas_jabatan != "TNO"){
        return redirect('goalmatching')->with('failed','Anda tidak dapat mengakses halaman tersebut');
      }
      $now = Carbon::now();
      $start = Carbon::now()->subDays(7);
      $officer = User::where('supervisor_nipp',Auth::user()->nipp)->get();
      $pertanyaan = Pertanyaan::where('kategori','Coachee')->get();
      return view('pages.goalmatching.coachee', compact('now','officer','pertanyaan'));
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
        //
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
