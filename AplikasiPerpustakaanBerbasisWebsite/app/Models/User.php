<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user'; // karena nama tabel kamu adalah 'user'
    protected $primaryKey = 'id_user'; // sesuai struktur database kamu

    public $timestamps = false; // karena tidak ada kolom created_at / updated_at

    protected $fillable = [
        'kode_user',
        'nis',
        'fullname',
        'username',
        'password',
        'kelas',
        'alamat',
        'verif',
        'role',
        'terakhir_login',
        'join_date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Default login pakai kolom 'username' bukan 'email'
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
