<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use SoftDeletes;

    protected $table = 'jalan_lingkungan';
    protected $fillable = [
        'FID',
        'Nama_Jalan',
        'Kategori',
        'Pjg_Jln',
        'Lbr_Perk',
        'Tahun',
    ];
    protected $dates = ['deleted_at'];
    const DELETED_AT = 'Deleted_at';
    public $timestamps = false;
}
