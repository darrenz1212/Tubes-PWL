<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;
    protected $table = 'polling';
    protected $primaryKey = 'id_matkul';

    protected $fillable = [
        'id_matkul',
        'kurikulum',
        'nama_matkul',
        'sks',
        'tanggal_dibuka',
        'tanggal_ditutup'
    ];
}
