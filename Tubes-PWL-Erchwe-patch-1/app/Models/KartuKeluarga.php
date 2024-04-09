<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'no';
    use HasFactory;

    protected $fillable = [
        'no',
        'KepalaKeluarga',
        ];
}
