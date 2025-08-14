<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiemployeesModels extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'em_id',
        'image_emp',
        'image_id_card',
        'code',
        'Id_card',
        'name_kh_emp',
        'name_en_emp',
        'created_at',
        'update_at',
        'deleted_at',
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
    ];
}
