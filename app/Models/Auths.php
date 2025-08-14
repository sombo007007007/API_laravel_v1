<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Branches;
use Laravel\Sanctum\HasApiTokens;

class Auths extends Model
{
    use HasApiTokens;
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
    public function branchs(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }
    // protected static function booted(){
    //     static::creating(function ($active){
    //         if(is_null($active->is_active)){
    //             $active->is_active = 1;
    //         }
    //     });
    //     static::updating(function ($active){
    //         if(is_null($active->is_active)){
    //             $active->is_active = 1;
    //         }
    //     });
    // }
}
