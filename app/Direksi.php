<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direksi extends Model
{
  protected $table = 'direksi';
  protected $fillable = [
      'id',
      'program_kerja',
      'divisi',
      'mulai',
      'berakhir'
  ];
}
