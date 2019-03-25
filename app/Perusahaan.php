<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
  protected $table = 'perusahaan';
  protected $primarykey = 'id';
  protected $fillable = [
      'id',
      'visi',
      'misi',
      'tahun'
  ];
}
