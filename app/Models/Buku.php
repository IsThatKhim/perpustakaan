<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Relasi;

class Buku extends Model
{
    use HasFactory;
 

    protected $table = "bukus";
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori',
    ];
 
    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
   
}
