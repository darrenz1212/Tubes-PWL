<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    protected $table = 'mata_kuliah';

    protected $fillable = [
        'id_matkul',
        'nama_matkul',
        'kurikulum',
        'sks',
    ];
}

