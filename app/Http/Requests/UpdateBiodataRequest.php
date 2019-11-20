<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBiodataRequest extends FormRequest
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
            'user_id' => 'required',
            'skill' => 'required',
            'profesi' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before:-17 years',
            'keterangan' => 'required',
            'foto_pribadi' => 'mimes:jpeg,jpg,png|max:2048',
            'cv' => 'mimes:pdf|max:5012'
        ];
    }
}
