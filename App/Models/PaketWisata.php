<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'paket_wisata';
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'fasilitas',
        'harga_per_pack',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_paket');
    }

    public function reservasiAktif()
    {
        return $this->hasMany(Reservasi::class, 'id_paket')
            ->whereNotIn('status_reservasi_wisata', ['ditolak', 'selesai']);
    }

}
