<?php

namespace App\Model;

use App\Model\Pertanahan\PertanahanFoto;
use App\Model\Pertanahan\PertanahanUpdate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetPoint extends Model
{
    use HasFactory;
    protected $table = 'aset_point';
    protected $connection = 'mysql_2';

    public function data_update()
    {
        return $this->hasOne(PertanahanUpdate::class, 'aset_point_id');
    }

    public function data_foto()
    {
        return $this->hasMany(PertanahanFoto::class, 'aset_point_id');
    }
}
