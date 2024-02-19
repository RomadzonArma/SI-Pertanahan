<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetPoint extends Model
{
    use HasFactory;
    protected $table = 'aset_point';
    protected $connection = 'mysql_2';
}
