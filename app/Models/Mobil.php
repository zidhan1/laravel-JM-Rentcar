<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    
    protected $table = 'Mobil';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','merek','tahun','harga','gambar','deskripsi','status'];
}
