<?php

namespace App\Model\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKecamatanSijali extends Model
{
    use HasFactory;
    protected $table = 'ref_kecamatan_sijali';

    public function jalan()
    {
        return $this->hasMany(LocalJalanLingkungan::class, 'Kecamatan');
    }
}
