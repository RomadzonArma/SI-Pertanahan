<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajuan extends Model
{
    use SoftDeletes;

    protected $table = 'pengajuan';
    protected $fillable = [
        'id',
        'nama',
        'pekerjaan',
        'alamat',
        'tanggal_pengajuan',
        'lokasi',
        'selaku',
        'kondisi_lapangan',
        'status',
        'bukti_kepemilikan_tanah_file',
        'bukti_kepemilikan_tanah_path',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
