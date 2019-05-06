<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
     public function index(){
       if(Auth::user()->kelas_jabatan != 1){
         return redirect('home')->with('failed','You do not have the privillege to access the page');
       }else{
         $users= User::paginate(10);
         return view('pages.user.user', compact('users'));
       };
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
      $request->validate([
        'nipp' => ['required', 'string', 'max:255'],
        'nama' => ['required', 'string', 'max:255'],
        'jabatan' => ['required', 'string', 'max:255'],
        'divisi' => ['required', 'string', 'max:255'],
        'kelas_jabatan' => ['required', 'int', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed']
      ]);
        User::create([
            'nipp' => $request->nipp,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'kelas_jabatan' => $request->kelas_jabatan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
      return redirect(route('superadmin.user'))->with('success','Sukses Menambahkan User!');
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
      $user_detail = User::find($id);
      return view('admin.user.edit', compact('user_detail'));
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
      $request->validate([
        'nama'=>'required',
        'email'=> 'required|email',
      ]);
      $path = $request->file('file')->storeAs('/public/profiles/',Auth::user()->nipp.'.jpg');
      $filename = base_path('storage/profiles/').Auth::user()->nipp.".jpg";
      $user = User::find($id);
      $user->nama = $request->get('nama');
      $user->email = $request->get('email');
      if(!empty($request->password)){
        $user->password = Hash::make($request->get('password'));
      };
      $user->avatar = $filename;
      $user->save();

      return redirect('user')->with('success', 'User telah diperbaharui');
    }

    public function myprofile($id){
      $user = User::find($id);
      return view('pages.profil.profil',compact('user'));
    }

    public function editprofile($id){
      $user = User::find($id);
      return view('pages.profil.edit',compact('user'));
    }

    public function updateprofile(Request $request, $id){
      $request->validate([
        'nama'=>'required',
        'email'=> 'required|email',
        'komentar' => 'string'
      ]);
      $user = User::find($id);
      $user->nama = $request->get('nama');
      $user->email = $request->get('email');
      $user->komentar = $request->get('komentar');
      $user->save();

      return redirect('home')->with('success','Sukses Mengupdate Profile Anda!');
    }

    public function editpassword($id){
      $user = User::find($id);
      return view('pages.profil.edit',compact('user'));
    }

    public function updatepassword(Request $request, $id){
      $request->validate([
        'password' => ['required', 'string', 'min:8', 'confirmed']
      ]);
      $user = User::find($id);
      $user->password = Hash::make($request->get('password'));
      $user->save();

      return redirect('home')->with('success','Sukses Mengubah Password!');
    }

    public function uploadpp(Request $request){
      $path = $request->file('file')->storeAs('/public/profiles/',Auth::user()->nipp.'.jpg');
      $filename = base_path('storage/profiles/').Auth::user()->nipp.".jpg";
      User::where('nipp',Auth::user()->nipp)->update([
        'avatar'=> $filename
      ]);
      return redirect('home')->with('success','Sukses mengubah Profile Picture!');
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
