<?php

namespace App\Model\Jalan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\LocalJalanLingkungan;

class JalanLingkunganUpdate extends Model
{
    use HasFactory;
    protected $table = 'jalan_lingkungan_update';

    use SoftDeletes;

    protected $fillable = [
        'jalan_lingkungan_id',
        'nomor_sertifikat',
        'nama_sertifikat',
        'penggunaan_saat_ini',
        'sertifikat_file',
        'created_at',
        'updated_at'
    ];

    public function jalan()
    {
        return $this->belongsTo(LocalJalanLingkungan::class);
    }
}
