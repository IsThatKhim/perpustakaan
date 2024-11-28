<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Buku;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'buku_id',
        'TanggalPeminjaman',
        'TanggalPengembalian',
        'StatusPeminjaman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
