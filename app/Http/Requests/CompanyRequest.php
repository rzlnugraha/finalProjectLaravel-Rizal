<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'waktu_bekerja' => 'required',
            'jenis_industri' => 'required',
            'deskripsi_perusahaan' => 'required',
            'foto_perusahaan' => 'required|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
