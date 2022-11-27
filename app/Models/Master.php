<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = ['merk_mobil', 'jenis_mobil', 'transmisi', 'bahan_bakar,', 'warna_mobil', 'tahun_pembuatan', 'harga'];
}
