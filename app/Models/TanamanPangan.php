<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanamanPangan extends Model
{
    protected $table = 'tb_tanamanpangan';
    protected $primaryKey = 'id_tanamanpangan'; // Mengatur primary key

    public function keterangan()
    {
        return $this->hasMany(Keterangan::class, 'id_tanamanpangan', 'id_tanamanpangan');
    }
}

