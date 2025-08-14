<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DistrictModels;

class CommunModels extends Model
{
    protected $table = 'communes';
    protected $primaryKey = 'com_id';
    public $timestamps = false;
    protected $fillable = [
        'com_id',
        'district_id',
        'code',
        'commune_name',
        'commune_namekh',
        'modify_date',
        'status',
        'created_at',
        'updated_at',
    ];
    protected static function booted()
    {
        static::creating( function ($communes) {
            if(is_null ($communes->status)){
                $communes->status = 1;
            }
        });

        static::updating( function ($communes){
            if(is_null ($communes->status)){
                $communes->status = 1;
            }
        });
    }
    public function district(){
        return $this->belongsTo(DistrictModels::class, 'district_id');
    }
}
