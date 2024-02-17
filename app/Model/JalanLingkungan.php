<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalanLingkungan extends Model
{
    use HasFactory;
    protected $table = 'jalan_lingkungan';
    protected $connection = 'mysql_3';
}
