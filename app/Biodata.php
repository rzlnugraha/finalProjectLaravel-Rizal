<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Biodata extends Model
{
    protected $fillable = [
        'user_id','tempat_lahir','tgl_lahir','foto_pribadi','cv','keterangan'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto_pribadi()
    {
        return '/images/biodata/' . $this->foto_pribadi;
    }
}
