<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judulbuku',
        'penulis',
        'publisher',
        'tahunterbit',
        'deskripsi',
        'jumlahhalaman',
        'coverbuku',
        'kategori'
    ];

    protected $casts = [
        'tahunterbit'=>'integer',
        'jumlahhalaman'=>'integer'
    ];
}
