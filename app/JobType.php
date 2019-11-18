<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;

class JobType extends Model
{
    protected $table='job_types';
    
    protected $fillable = [
        'job_type'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'id');
    }
}
