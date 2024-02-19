<?php

namespace App\Model\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKelurahanSijali extends Model
{
    use HasFactory;
    protected $table = 'ref_kelurahan_sijali';

    public function jalan()
    {
        return $this->hasMany(LocalJalanLingkungan::class, 'Kelurahan');
    }
}
