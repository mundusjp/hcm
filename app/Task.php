<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $table = 'task';
  protected $fillable = [
      'nipp',
      'officer_nipp',
      'program_kerja',
      'target_proker',
      'task',
      'minggu_ke',
      'progress',
      'status_task'
  ];
}
