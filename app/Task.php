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
      'minggu',
      'bulan',
      'tahun',
      'kategori',
      'progress',
      'status_task',
      'due_date',
      'keterangan'
  ];
}
