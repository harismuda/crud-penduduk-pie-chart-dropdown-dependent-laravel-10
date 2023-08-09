<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penduduk extends Model
{
    use HasFactory;
    protected $table = "penduduk";
    protected $fillable = ['nik', 'no_kk', 'nama', 'jk', 'alamat', 'no_hp', 'agama', 'pekerjaan'];
}
