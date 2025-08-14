<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $primaryKey = 'Att_id';
    public $timestamps = false;
    protected $fillable = [
        'Att_id',
        'Att_type',
        'Att_time_date',
        'employee_id',
        'created_at',
        'updated_at',
    ];
    public function employees(){
        return $this->belongsTo(Employees::class, 'employee_id');
    }
}
