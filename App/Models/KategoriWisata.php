<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    protected $table = 'kategori_wisata';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'kategori_wisata',
    ];

    public function obyek_wisata()
    {
        return $this->hasMany(ObyekWisata::class);
    }
}
