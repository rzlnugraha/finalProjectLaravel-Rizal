<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JobType;
use App\Company;
use App\Apply;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'userjobs';

    protected $fillable = [
        'tipe_job', 'company_id','nama_pekerjaan','requirements','tanggal_expired','gaji','deskripsi_pekerjaan'
    ];

    public function job_types()
    {
        return $this->belongsTo(JobType::class, 'tipe_job');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
}
