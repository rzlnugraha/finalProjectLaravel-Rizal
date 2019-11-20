<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Education extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'education';
    
    protected $fillable = [
        'user_id','sekolah','angkatan','lulus_tahun','pendidikan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
