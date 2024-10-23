<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;
    protected $table = 'tb_daerahrawan'; // Pastikan nama tabel sesuai
    protected $primaryKey = 'id_daerah'; 
    protected $fillable = [
        'nama_daerah',
        'latitude',
        'longitude',
    ];

    public function keterangan()
    {
        return $this->hasMany(Keterangan::class, 'id_daerah');
    }

    public $timestamps = false; 
}
