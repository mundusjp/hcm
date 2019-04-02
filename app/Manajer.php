<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manajer extends Model
{
  protected $table = 'manajer';
  protected $fillable = [
      'id',
      'nipp',
      'divisi',
      'sub_divisi',
      'program_direksi',
      'id_prodir',
      'program_kerja_terkait',
      'id_prokerkait',
      'program_kerja',
      'mulai',
      'berakhir',
      'minggu',
      'bulan',
      'tahun',
      'kategori',
      'status_proker',
      'keterangan'
  ];
}
