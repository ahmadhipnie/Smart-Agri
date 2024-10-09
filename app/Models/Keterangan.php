<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    protected $table = 'tb_keterangan';

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    public function tanamanPangan()
    {
        return $this->belongsTo(TanamanPangan::class, 'id_tanamanpangan', 'id_tanamanpangan'); // Kolom foreign key dan local key
    }

    public function iklim()
    {
        return $this->belongsTo(Iklim::class, 'id_iklim');
    }

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'id_daerah');
    }
}
