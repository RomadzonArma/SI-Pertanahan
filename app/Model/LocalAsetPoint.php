<?php

namespace App\Model;

use App\Model\Ref\RefKecamatanSijali;
use App\Model\Ref\RefKelurahanSijali;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalAsetPoint extends Model
{
    use HasFactory;
    protected $table = 'aset_point';

    public function kec()
    {
        return $this->belongsTo(RefKecamatanSijali::class, 'Kecamatan', 'id_kecamatan');
    }

    public function kel()
    {
        return $this->belongsTo(RefKelurahanSijali::class, 'Kelurahan', 'id_kelurahan');
    }

}
