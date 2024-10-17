<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklim extends Model
{
    protected $table = 'tb_jenisiklim'; // Pastikan nama tabel sesuai
    protected $primaryKey = 'id_iklim'; // Mengatur primary key

    public function keterangan()
    {
        return $this->hasMany(Keterangan::class, 'id_iklim', 'id_iklim');
    }
}
