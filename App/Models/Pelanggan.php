<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat',
        'foto',
        'id_users',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
