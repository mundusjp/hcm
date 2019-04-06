<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manajer extends Model
{
  protected $table = 'manajer';
  protected $fillable = [
      'id',
      'nipp',
      'nipp_pj',
      'divisi',
      'sub_divisi',
      'sub_subdivisi',
      'program_direksi',
      'id_prodir',
      'program_kerja_terkait',
      'id_prokerkait',
      'program_kerja',
      'target',
      'mulai',
      'berakhir',
      'bobot',
      'hari',
      'minggu',
      'bulan',
      'tahun',
      'kategori',
      'progres',
      'status_proker',
      'keterangan'
  ];
}
