<?php

namespace App\Model\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKecamatanSinta extends Model
{
    use HasFactory;
    protected $table = 'ref_kecamatan_sinta';

    public function jalan()
    {
        return $this->hasMany(LocalAsetPoint::class, 'kec_id');
    }
}
