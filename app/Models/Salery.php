<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Salery extends Model
{
    protected $table = 'saleris';
    protected $primaryKey = 'salery_id';
    public $timestamps = false;
    protected $fillable = [
        'salery_id',
        'salery',
        'bonus',
        'loan',
        'Last_update',
        'employee_id',
        'created_at',
        'updated_at',
    ];
    public function employees(){
        return $this->belongsTo(Employees::class, 'employee_id');
    }
}
