<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table="books";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_buku',
        'penulis',
        'tentang_buku',
        'status_buku',
        'foto',
    ];

    public function borrow()
    {
        return $this->hasMany(Borrow::class);
    }

}
