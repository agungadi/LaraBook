<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table="borrows";

    protected $primaryKey = 'id_peminjaman';

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
    public function book(){
        return $this->belongsTo(Book::class, 'id_book');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_member');
    }
}
