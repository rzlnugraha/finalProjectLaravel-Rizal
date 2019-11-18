<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipe_job' => 'required',
            'nama_pekerjaan' => 'required',
            'nama_perusahaan' => 'required',
            'requirements' => 'required',
            'tanggal_expired' => 'date|after:now',
            'gaji' => 'numeric',
            'alamat_perusahaan' => 'required',
            'deskripsi' => 'required',
            'foto_perusahaan' => 'required|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
