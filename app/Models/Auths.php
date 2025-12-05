<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Auths extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'image',
        'email',
        'name',
        'password',
        'role_id',
        'creator_id',
        'updator_id',
        'deletor_id',
        'phone',
        'profile',
        'is_hr',
        'remember_token',
        'branch_id',
        'is_active',
        'created_at',
        'updated_at',
        'deteled_at',
    ];

    public function branchs()
    {
        return $this->belongsTo(Branches::class, 'branch_id');
    }
}
