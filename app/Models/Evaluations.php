<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auths;

class Evaluations extends Model
{
    protected $table = 'evaluations';
    protected $primaryKey = 'eval_id';
    public $timestamps = false;
    protected $fillable = [
        'eval_id',
        'User_id',
        'Eval_value',
        'Notes',
        'created_at',
        'updated_at',
    ];
    public function admins(){
        return $this->belongsTo(Auths::class, 'User_id');
    }
}
