<?php

namespace App\Models;

use Laratrust\Contracts\LaratrustUser;  // Import LaratrustUser contract
use Laratrust\Traits\HasRolesAndPermissions; // Import HasRolesAndPermissions trait
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements LaratrustUser
{
    use HasRolesAndPermissions;  // Gunakan trait HasRolesAndPermissions

    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Anda dapat menambahkan lebih banyak atribut atau metode di sini jika diperlukan.
}
