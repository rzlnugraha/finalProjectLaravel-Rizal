<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Job;

class Company extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'companies';
    protected $fillable = [
        'nama_perusahaan','alamat_perusahaan','waktu_bekerja','jenis_industri','deskripsi_perusahaan','foto_perusahaan'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'id');
    }
}
