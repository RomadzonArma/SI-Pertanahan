<?php

namespace App\Model;

use App\Model\Ref\RefKecamatanSinta;
use App\Model\Ref\RefKelurahanSinta;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use App\Model\Pertanahan\PertanahanFoto;
use App\Model\Pertanahan\PertanahanUpdate;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocalAsetPoint extends Model
{
    use HasFactory;
    protected $table = 'aset_point';

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_active', '=', 1);
        });
    }

    public function kec()
    {
        return $this->belongsTo(RefKecamatanSinta::class, 'kec_id', 'id_kecamatan');
    }

    public function kel()
    {
        return $this->belongsTo(RefKelurahanSinta::class, 'kel_id', 'id_kelurahan');
    }

    public function data_update()
    {
        return $this->hasOne(PertanahanUpdate::class, 'aset_point_id');
    }

    public function data_foto()
    {
        return $this->hasMany(PertanahanFoto::class, 'aset_point_id');
    }

    // custom soft delete
    public function delete()
    {
        // Check if the model is not already soft deleted
        if ($this->is_active != 0) {
            $this->is_active = 0; // Soft delete the model
            $this->save();
        }
    }

    public function restore()
    {
        // Check if the model is soft deleted
        if ($this->is_active == 0) {
            $this->is_active = 1; // Restore the model
            $this->save();
        }
    }

    public static function onlyTrashed()
    {
        return static::withoutGlobalScope('active')->where('is_active', '=', 0);
    }

}

