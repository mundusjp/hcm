<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalsettingController extends Controller
{
  //PERUSAHAAN//
  public function index_perusahaan(){
    return view('pages.goalsetting.perusahaan');
  }

  public function insert_visi_perusahaan(){
    return view('pages.goalsetting.perusahaan');
  }

  public function edit_visi_perusahaan(){
    return view('pages.goalsetting.perusahaan');
  }

  public function update_visi_perusahaan(){
    return view('pages.goalsetting.perusahaan');
  }

  public function delete_visi_perusahaan(){
    return view('pages.goalsetting.perusahaan');
  }

// -------------------------------------------------------------------------------
  //DIREKSI//
  public function index_direksi(){
    return view('pages.goalsetting.direksi');
  }

  public function insert_misi_direksi(){
    return view('pages.goalsetting.direksi');
  }

  public function edit_misi_direksi(){
    return view('pages.goalsetting.direksi');
  }

  public function update_misi_direksi(){
    return view('pages.goalsetting.direksi');
  }

  public function delete_misi_direksi(){
    return view('pages.goalsetting.direksi');
  }


// -------------------------------------------------------------------------------
  //SUPERVISOR//
  public function index_supervisor(){
    return view('pages.goalsetting.supervisor');
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
}
