<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollDet extends Model
{
    use HasFactory;
    protected $table = 'polling_detail';
    protected $fillable = [
        'id_pollingDetail',
        'nrp',
        'id_polling'
    ];
}
