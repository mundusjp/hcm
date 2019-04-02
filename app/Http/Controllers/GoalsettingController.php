<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class GoalsettingController extends Controller
{
    public function goal_matching(){
      $officer = User::where('supervisor_nipp', Auth::user()->nipp)->get();
      return view('pages.goalmatching',compact('officer'));
    }
}
