<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProvinceModels;

class DistrictModels extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'dis_id';
    public $timestamps = false;
    protected $fillable = [
        'dis_id',
        'pro_id',
        'code',
        'district_name',
        'district_namekh',
        'modify_date',
        'created_at',
        'updated_at',
    ];
    public function provinces()
    {
        return $this->belongsTo(ProvinceModels::class, 'pro_id');
    }
}
