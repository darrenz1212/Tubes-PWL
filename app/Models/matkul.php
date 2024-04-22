<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_matkul';
    protected $fillable = [
        'kode_matkul',
        'kurikulum',
        'nama_matkul',
        'sks',
    ];
}