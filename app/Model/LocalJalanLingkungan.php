<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\Ref\RefKecamatanSijali;
use App\Model\Ref\RefKelurahanSijali;

class LocalJalanLingkungan extends Model
{
    use HasFactory;
    protected $table = 'jalan_lingkungan';

    use SoftDeletes;
    const DELETED_AT = 'Deleted_at';

    public function kec()
    {
        return $this->belongsTo(RefKecamatanSijali::class, 'Kecamatan', 'id_kecamatan');
    }

    public function kel()
    {
        return $this->belongsTo(RefKelurahanSijali::class, 'Kelurahan', 'id_kelurahan');
    }
}
