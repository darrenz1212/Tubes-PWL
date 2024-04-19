<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nrp',
        'nama',
        'email',
        'password',
        'prodi',
        'fakultas',
        'role',
        'kurikulum'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $primaryKey = 'nrp';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function pollDets()
    {
        return $this->hasMany(PollDet::class);
    }

    public function isAdmin($userType)
    {
        if ($userType === 'Admin') {
            return $this->role === 2;
        } elseif ($userType === 'Mahasiswa') {
            return $this->role === 1;
        } elseif($userType === 'Prodi') {
            return $this->role === 0;
        }
        return false;
    }



}
