<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacations extends Model
{
    protected $table = 'vacations';
    protected $primaryKey = 'vacation_id';
    public $timestamps = false;
    protected $fillable = [
        'vacation_id',
        'vacation_title',
        'vacation_from_date',
        'vacation_to_date',
        'employee_id',
        'created_at',
        'updated_at',
    ];
    public function employees(){
        return $this->belongsTo(Employees::class, 'employee_id');
    }
}
