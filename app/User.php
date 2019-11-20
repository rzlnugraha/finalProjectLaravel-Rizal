<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Biodata;
use App\Education;
use App\Apply;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($users) {
            foreach ($users->biodata()->get() as $biodata) {
                $biodata->delete();
            }
        });
    }

    public function roles()
    {
        return $this->BelongsToMany(Role::class, 'role_users');
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class)->withTrashed();
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }

    public function foto()
    {
        if (file_exists(public_path() . '/images/biodata/' . $this->biodata->foto_pribadi) && $this->biodata->foto_pribadi != null) {
            return '/images/biodata/' . $this->biodata->foto_pribadi;
        } else {
            return url('/images/afe.png');
        }
    }
}
