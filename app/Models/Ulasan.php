<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'Ulasan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_mobil', 'ulasan'];
}
