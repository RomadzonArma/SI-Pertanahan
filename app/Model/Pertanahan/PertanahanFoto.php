<?php

namespace App\Model\Pertanahan;

use App\Model\LocalAsetPoint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class PertanahanFoto extends Model
{
    use HasFactory;
    protected $table = 'aset_point_foto';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'aset_point_id',
        'foto_file',
    ];

    // Disable auto-increment.
    public $incrementing = false;

    // Set the primary key type to string.
    protected $keyType = 'string';

    // Boot function to assign a UUID when creating a new model instance.
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
            }
        });

        static::deleting(function ($model) {
            if (!empty($model->foto_file)) {
                $filePath = public_path($model->foto_file);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        });
    }

    public function tanah()
    {
        return $this->belongsTo(LocalAsetPoint::class);
    }
}
