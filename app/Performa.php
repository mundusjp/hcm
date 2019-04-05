<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performa extends Model
{
    protected $table = 'performa';
    protected $fillable = [
        'jumlah_task_minggu_ini',
        'jumlah_task_gagal_minggu_ini',
        'jumlah_task_pending_minggu_ini',
        'performa_minggu_ini',
        'minggu',
        'jumlah_task_bulan_ini',
        'jumlah_task_gagal_bulan_ini',
        'jumlah_task_pending_bulan_ini',
        'performa_bulan_ini',
        'bulan',
        'jumlah_task_tahun_ini',
        'jumlah_task_gagal_tahun_ini',
        'jumlah_task_pending_tahun_ini',
        'performa_tahun_ini',
        'tahun'
    ];
}
