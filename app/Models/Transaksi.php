<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'Transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_mobil', 'tgl_sewa', 'tgl_kembali', 'pembayaran', 'jaminan'];
}
