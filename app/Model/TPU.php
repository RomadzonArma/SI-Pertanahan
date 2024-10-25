<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPU extends Model
{
    use HasFactory;
    protected $table='tpu';
    protected $guarded  = ['id'];
}
