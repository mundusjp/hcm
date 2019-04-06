<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direksi extends Model
{
  protected $table = 'direksi';
  protected $fillable = [
      'id',
      'nipp',
      'nipp_pj',
      'program_kerja',
      'divisi',
      'mulai',
      'progres',
      'status',
      'berakhir'
  ];
}
