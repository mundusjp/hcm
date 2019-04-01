<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manajer extends Model
{
  protected $table = 'manajer';
  protected $fillable = [
      'id',
      'program_kerja',
      'divisi',
      'mulai',
      'berakhir',
      'minggu_ke'
  ];
}
