<?php

namespace App\Model\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKelurahanSinta extends Model
{
    use HasFactory;
    protected $table = 'ref_kelurahan_sinta';

    public function jalan()
    {
        return $this->hasMany(LocalAsetPoint::class, 'kel_id');
    }
}
