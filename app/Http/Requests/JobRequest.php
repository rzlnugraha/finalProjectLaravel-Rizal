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
            'company_id' => 'required',
            'nama_pekerjaan' => 'required',
            'requirements' => 'required',
            'tanggal_expired' => 'required|date|after:now',
            'gaji' => 'numeric',
            'deskripsi_pekerjaan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tipe_job.required' => 'Tipe pekerjaan harus dipilih',
            'company_id.required' => 'Perusahaan harus dipilih',
            'nama_pekerjaan.required' => 'Pekerjaan harus diisi',
            'requirements.required' => 'Requirements harus diisi',
            'tanggal_expired.required' => 'Tanggal terakhir apply job harus diisi',
            'tanggal_expired.after' => 'Tidak boleh mengisi sebelum tanggal hari ini',
            'gaji.numeric' => 'Gaji harus angka',
            'deskripsi_pekerjaan.required' => 'Deskripsi pekerjaan tidak boleh kosong',
        ];
    }
}
