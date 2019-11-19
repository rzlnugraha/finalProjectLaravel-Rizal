<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Education extends Model
{
    protected $fillable = [
        'user_id','sekolah','angkatan','lulus_tahun','pendidikan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
