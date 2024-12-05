<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    protected $table = 'tb_pendapatan';

    protected $fillable = [
        'rentang_tanggal',
        'kategori',
        'total',
        'keterangan',
    ];
}

