<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_buku',
        'penulis',
        'tentang_buku',
        'status_buku',
        'foto',
    ];

}
