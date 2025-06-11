<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $fillable = [
        'id_pelanggan',
        'id_paket_wisata',
        'tgl_reservasi_wisata',
        'tgl_selesai_reservasi',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'file_bukti_tf', 
        'status_reservasi_wisata',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket_wisata');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
