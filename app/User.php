<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nipp',
        'supervisor_nipp',
        'nama',
        'email',
        'password',
        'jabatan',
        'divisi',
        'sub_divisi',
        'sub_subdivisi',
        'kelas_jataban',
        'golongan',
        'pendidikan',
        'sta_kel',
        'jenis_kelamin',
        'agama',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
