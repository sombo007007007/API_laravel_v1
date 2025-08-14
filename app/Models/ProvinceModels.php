<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceModels extends Model
{
    protected $table = 'provinces';
    protected $primaryKey = 'province_id';
    public $timestamps = false;
    protected $fillable = [
        'province_id',
        'postal_code',
        'province_en_name',
        'province_kh_name',
        'branch_id',
        'created_at',
        'updated_at',
    ];
    public function Branches(){
        return $this->belongsTo('App\Models\Branches','branch_id');
    }
}
