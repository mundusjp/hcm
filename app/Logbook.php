<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
  protected $table = 'logbook';
  protected $fillable = [
      'nipp',
      'task_id',
      'target',
      'logbook'
      'deadline',
      'status'
  ];
}
