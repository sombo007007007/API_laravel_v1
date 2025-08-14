<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
    protected $table = 'trainings';
    protected $primaryKey = 'training_id';
    public $timestamps = false;
    protected $fillable = [
        'training_id',
        'training_title',
        'training_description',
        'created_at',
        'updated_at',
    ];
}
