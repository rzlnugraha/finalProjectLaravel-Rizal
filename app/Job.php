<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JobType;
use App\Company;

class Job extends Model
{
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

    public function foto()
    {
        if (file_exists(public_path() . '/images/job/' . $this->foto_perusahaan) && $this->foto_perusahaan != null) {
            return '/images/job/' . $this->foto_perusahaan;
        } else {
            return url('/img/afe.png');
        }
    }
}
