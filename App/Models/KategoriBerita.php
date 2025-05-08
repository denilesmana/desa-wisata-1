<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class KategoriBerita extends Model
{
    protected $table = 'kategori_berita';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id', 'kategori_berita',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
    
}
