<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalanLingkunganCoord extends Model
{
    use HasFactory;
    protected $table = 'jalan_lingkungan_coord';
    protected $connection = 'mysql_3';
}
