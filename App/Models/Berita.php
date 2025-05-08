<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'berita',
        'tgl_post',
        'id_kategori_berita',
        'foto',
    ];

    public function kategori_berita()
    {
        return $this->belongsTo(KategoriBerita::class, 'id_kategori_berita');
    }



}
