<?php

namespace App\Model\Jalan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;

use App\Model\LocalJalanLingkungan;

class JalanLingkunganFoto extends Model
{
    use HasFactory;
    protected $table = 'jalan_lingkungan_foto';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'jalan_lingkungan_id',
        'foto_file',
        'created_at',
        'updated_at'
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

    public function jalan()
    {
        return $this->belongsTo(LocalJalanLingkungan::class);
    }
}
