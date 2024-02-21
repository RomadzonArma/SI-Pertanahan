<?php

namespace App\Model;

use App\Model\Ref\RefKecamatanSijali;
use App\Model\Ref\RefKelurahanSijali;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocalAsetPoint extends Model
{
    use HasFactory;
    protected $table = 'aset_point';
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(RefKecamatanSijali::class, 'kec_id', 'id_kecamatan');
    }

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(RefKelurahanSijali::class, 'kel_id', 'id_kelurahan');
    }
}

