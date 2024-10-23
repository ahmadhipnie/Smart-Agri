<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Keterangan; // Pastikan ini sesuai dengan namespace Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaerahRawanPanganController extends Controller
{
    // public function index()
    // {
    //     $data = DB::table('tb_keterangan')
    //         ->select('tb_keterangan.id_keterangan', 
    //                  'tb_keterangan.deskripsi', 
    //                  'tb_keterangan.tanggal', 
    //                  'tb_keterangan.gambar', 
    //                  'tb_tanamanpangan.nama_tanamanpangan', 
    //                  'tb_jenisiklim.nama_iklim', 
    //                  'tb_daerahrawan.nama_daerah', 
    //                  'tb_daerahrawan.latitude', 
    //                  'tb_daerahrawan.longitude')
    //         ->join('tb_tanamanpangan', 'tb_keterangan.id_tanamanpangan', '=', 'tb_tanamanpangan.id_tanamanpangan')
    //         ->join('tb_jenisiklim', 'tb_keterangan.id_iklim', '=', 'tb_jenisiklim.id_iklim')
    //         ->join('tb_daerahrawan', 'tb_keterangan.id_daerah', '=', 'tb_daerahrawan.id_daerah')
    //         ->whereMonth('tb_keterangan.tanggal', 1) // Ambil data untuk bulan Januari
    //         ->get();
    
    //     return view('backend.daerahpangan.index', compact('data'));
    // }

    public function index(Request $request)
{
    // Ambil bulan dari request, default ke Januari jika tidak ada
    $month = $request->input('month', 1);

    // Ambil data dari database dengan filter bulan
    $data = DB::table('tb_keterangan')
        ->join('tb_tanamanpangan', 'tb_keterangan.id_tanamanpangan', '=', 'tb_tanamanpangan.id_tanamanpangan')
        ->join('tb_jenisiklim', 'tb_keterangan.id_iklim', '=', 'tb_jenisiklim.id_iklim')
        ->join('tb_daerahrawan', 'tb_keterangan.id_daerah', '=', 'tb_daerahrawan.id_daerah')
        ->select('tb_keterangan.*', 'tb_tanamanpangan.nama_tanamanpangan', 'tb_jenisiklim.nama_iklim', 'tb_daerahrawan.nama_daerah', 'tb_daerahrawan.latitude', 'tb_daerahrawan.longitude')
        ->whereMonth('tb_keterangan.tanggal', $month)
        ->get();

        return view('backend.daerahpangan.index', compact('data'));
}

public function filter(Request $request)
{
    // Ambil bulan dari request, default ke Januari jika tidak ada
    $month = $request->input('month', 1);

    // Ambil data dari database dengan filter bulan
    $data = DB::table('tb_keterangan')
        ->join('tb_tanamanpangan', 'tb_keterangan.id_tanamanpangan', '=', 'tb_tanamanpangan.id_tanamanpangan')
        ->join('tb_jenisiklim', 'tb_keterangan.id_iklim', '=', 'tb_jenisiklim.id_iklim')
        ->join('tb_daerahrawan', 'tb_keterangan.id_daerah', '=', 'tb_daerahrawan.id_daerah')
        ->select('tb_keterangan.*', 'tb_tanamanpangan.nama_tanamanpangan', 'tb_jenisiklim.nama_iklim', 'tb_daerahrawan.nama_daerah', 'tb_daerahrawan.latitude', 'tb_daerahrawan.longitude')
        ->whereMonth('tb_keterangan.tanggal', $month)
        ->get();

    return view('backend.daerahpangan.index', compact('data'));
}


}
