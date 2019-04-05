<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $table = 'company';
  protected $fillable = [
      'id',
      'nama',
      'alamat',
      'no_telp',
      'email'
  ];
}
