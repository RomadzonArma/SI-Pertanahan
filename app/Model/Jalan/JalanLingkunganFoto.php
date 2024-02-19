<?php

namespace App\Model\Jalan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\LocalJalanLingkungan;

class JalanLingkunganFoto extends Model
{
    use HasFactory;
    protected $table = 'jalan_lingkungan_foto';

    use SoftDeletes;

    public function jalan()
    {
        return $this->belongsTo(LocalJalanLingkungan::class);
    }
}
