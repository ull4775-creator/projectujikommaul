<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'penggunas';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nik', 'username', 'nama', 'alamat', 'no_hp', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $incrementing = true;
    protected $keyType = 'int';
}
