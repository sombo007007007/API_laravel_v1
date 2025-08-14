<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    public $timestamps = false;
    protected $table = 'branches';
    protected $fillable = [
        'id',
        'address',
        'description',
        'name_en',
        'name_kh',
        'owner_name_en',
        'owner_name_kh',
        'owner_title_en',
        'owner_title_kh',
        'sex',
        'date_of_birth',
        'nationality',
        'image',
        'icon',
        'updated_at',
        'created_at',
    ];
}
