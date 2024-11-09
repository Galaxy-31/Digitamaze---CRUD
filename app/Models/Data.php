<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'datas'; // Specifies the correct table name

    protected $fillable = [
        'nama',
        'murid',
        'kelas'
    ];
}
