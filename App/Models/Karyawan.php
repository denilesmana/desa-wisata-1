<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_karyawan',
        'alamat',
        'no_hp',
        'jabatan',
        'id_users',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
