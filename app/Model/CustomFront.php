<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomFront extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="custom_fronts";
    protected $fillable = [
        'id', 'judul','title_header','alamat','email','telp','footer','logo_header','logo_footer',
    ];
}

