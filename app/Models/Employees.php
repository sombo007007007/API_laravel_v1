<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Branches;
use App\Models\ProvinceModels;
use App\Models\DistrictModels;
use App\Models\CommunModels;
use App\Models\Village;

class Employees extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'em_id';
    public $timestamps = false;
    protected $fillable = [
        'em_id',
        'image_emp',
        'image_id_card',
        'code_employees',
        'Id_card',
        'name_kh_emp',
        'name_en_emp',
        'date_of_brithdy',
        'identity',
        'sex',
        'email_emp',
        'password_emp',
        'mobile_emp',
        'status',
        'provi_id',
        'distr_id',
        'commu_id',
        'villag_id',
        'branch_id',
        'created_at',
        'updated_at'
    ];
    public function branche(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }
    public function province(){
        return $this->belongsTo(ProvinceModels::class, 'provi_id');
    }
    public function district(){
        return $this->belongsTo(DistrictModels::class, 'distr_id');
    }
    public function communs(){
        return $this->belongsTo(CommunModels::class, 'commu_id');
    }
    public function village(){
        return $this->belongsTo(Village::class, 'villag_id');
    }
    public static function boot(){
        parent::boot();
        static::creating(function ($employees) {
            $namePart = strtoupper(Str::slug(Str::before($employees->name_en_emp, ' '), '_'));
            if (empty($namePart)) {
            $namePart = 'EMP';
            }
            $count = Employees::where('name_en_emp', $employees->name_en_emp)->count() + 1;
            $employees->code_employees = 'TK-' . $namePart . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        });

        static::updating(function ($employees) {
            $namePart = strtoupper(Str::slug(Str::before($employees->name_en_emp, ' '), '_'));
            if (empty($namePart)) {
                $namePart = 'EMP';
            }
            $count = Employees::where('name_en_emp', $employees->name_en_emp)->count() + 1;
            $employees->code_employees = 'TK-' . $namePart . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        });
    }

    protected static function booted()
    {
        static::creating( function ($employees) {
            if(is_null ($employees->status)){
                $employees->status = 1;
            }
        });

        static::updating( function ($employees){
            if(is_null ($employees->status)){
                $employees->status = 1;
            }
        });
    }
}
