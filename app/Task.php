<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $table = 'task';
  protected $fillable = [
      'id',
      'nipp',
      'nipp_pj',
      'sub_divisi',
      'sub_subdivisi',
      '3rd_divisi',
      'program_vp',
      'id_provp',
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
      'status_task',
      'due_date',
      'keterangan'
  ];
}
