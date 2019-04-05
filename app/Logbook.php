<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
  protected $table = 'logbook';
  protected $fillable = [
      'id',
      'nipp',
      'program_kerja_terkait',
      'id_program_kerja_terkait',
      'target',
      'logbook',
      'status',
      'tanggal',
      'minggu',
      'bulan',
      'tahun'
  ];
}
