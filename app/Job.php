<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JobType;

class Job extends Model
{
    protected $fillable = [
        'tipe_job','nama_pekerjaan','nama_perusahaan','requirements','tanggal_expired','gaji','alamat_perusahaan','deskripsi','foto_perusahaan'
    ];

    public function job_types()
    {
        return $this->belongsTo(JobType::class, 'tipe_job');
    }
}
