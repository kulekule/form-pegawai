<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use SoftDeletes;
    protected $table = "karyawan";

    protected $fillable = [
        "id",
        "nama_karyawan",
        "jabatan",
        "golongan",
        "alamat",
        "tempat_lahir",
        "tanggal_lahir",
        "jenis_kelamin",
        "no_hp",
    ];
}
