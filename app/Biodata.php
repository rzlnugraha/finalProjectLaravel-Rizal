<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Biodata extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id','tempat_lahir','tgl_lahir','foto_pribadi','cv','keterangan'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function foto_pribadi()
    {
        return '/images/biodata/' . $this->foto_pribadi;
    }
}
