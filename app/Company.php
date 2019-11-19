<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'nama_perusahaan','alamat_perusahaan','waktu_bekerja','jenis_industri','deskripsi_perusahaan','foto_perusahaan'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'id');
    }
}
