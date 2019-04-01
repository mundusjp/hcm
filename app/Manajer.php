<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manajer extends Model
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
