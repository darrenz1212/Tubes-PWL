<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;
    protected $table = 'polling';

    protected $fillable = [
        'id_matkul',
        'nrp',
        'kurikulum',
        'nama_matkul',
        'sks',
        'tanggal_dibuka',
        'tanggal_ditutup'
    ];

}
