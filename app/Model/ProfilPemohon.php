<?php

namespace App\Model;

use App\Model\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilPemohon extends Model
{
    use SoftDeletes;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'pekerjaan',
        'email',
        'no_telp',
        'alamat',
        'username',
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }
}
