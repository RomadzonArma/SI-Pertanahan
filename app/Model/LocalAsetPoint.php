<?php

namespace App\Model;

use App\Model\Ref\RefKecamatanSinta;
use App\Model\Ref\RefKelurahanSinta;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocalAsetPoint extends Model
{
    use HasFactory;
    protected $table = 'aset_point';

    public function kec()
    {
        return $this->belongsTo(RefKecamatanSinta::class, 'kec_id', 'id_kecamatan');
    }

    public function kel()
    {
        return $this->belongsTo(RefKelurahanSinta::class, 'kel_id', 'id_kelurahan');
    }

}

