<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommunModels;

class Village extends Model
{
    protected $table = 'villages';
    protected $primaryKey = 'vill_id';
    public $timestamps = false;
    protected $fillable = [
        'vill_id',
        'commune_id',
        'code',
        'village_name',
        'village_namekh',
        'modify_date',
        'status',
        'created_at',
        'updated_at',
    ];
    protected static function booted(){
        static::creating( function ($village){
            if(is_null ($village->status)){
                $village->status = 1;
            }
        });
        static::updating(function($village){
            if(is_null ($village->status)){
                $village->status = 1;
            }
        });
    }
    public function village(){
        return $this->belongsTo(CommunModels::class,'commune_id');
    }

}
