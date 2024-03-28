<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'nik';

    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'tgl_lahir',
        'agama',
        'gol_darah',
        'kartu_keluarga_nomor',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(KartuKeluarga::class);
    }
}
