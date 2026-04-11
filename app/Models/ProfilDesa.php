<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $fillable = [
        'nama_desa',
        'tagline',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'alamat',
        'telepon',
        'email',
        'visi',
        'misi',
        'sejarah',
        'nama_kades',
        'masa_jabatan',
        'sambutan',
        'foto_kades',
        'jumlah_penduduk',
        'jumlah_kk',
        'luas_wilayah',
        'jumlah_rt',
        'jumlah_rw',
        'jumlah_rtrw',
    ];
}
