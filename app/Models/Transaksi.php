<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_pemesan', 'tanggal_pemesanan', 'kode_pemesanan', 'mobil_pesanan', 'lama_rental', 'total_pembayaran'];
}
