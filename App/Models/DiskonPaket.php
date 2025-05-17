<?php

namespace App\Models;

use App\Http\Controllers\PaketWisataController;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaketWisata;

class DiskonPaket extends Model
{
    protected $table = 'diskon_paket';

    protected $fillable = [
        'id_paket',
        'diskon',
        'tgl_mulai',
        'tgl_akhir',
        'aktif'
    ];

    public function paket_wisata()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }
}
