<?php

namespace App\Model\Pertanahan;

use App\Model\AsetPoint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PertanahanUpdate extends Model
{
    use HasFactory;
    protected $table = 'aset_point_update';

    use SoftDeletes;

    protected $fillable = [
        'aset_point_id',
        'nomor_sertifikat',
        'nama_sertifikat',
        'penggunaan_saat_ini',
        'sertifikat_file',
        'created_at',
        'updated_at'
    ];

    public function tanah()
    {
        return $this->belongsTo(AsetPoint::class);
    }
}
