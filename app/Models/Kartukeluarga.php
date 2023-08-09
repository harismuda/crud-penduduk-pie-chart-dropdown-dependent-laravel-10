<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartukeluarga extends Model
{
    use HasFactory;
    protected $table = "kk";
    protected $fillable = ['no_kk', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'foto'];
}
