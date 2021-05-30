<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_peminjaman',
        'id_member',
        'id_book',
        'tanggal_pinjam',
        'tanggal_kembali',
        'denda',
        'status',
    ];

}
