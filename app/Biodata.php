<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Biodata extends Model
{
    protected $fillable = [

    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
