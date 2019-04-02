<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $table = 'task';
  protected $fillable = [
      'id',
      'nipp',
      'officer_nipp',
      'program_vp',
      'id_provp'
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
