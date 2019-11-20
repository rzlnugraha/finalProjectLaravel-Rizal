<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBiodataRequest extends FormRequest
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
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before:-17 years',
            'foto_pribadi' => 'mimes:jpg,jpeg,png|max:2048',
            'cv' => 'file|mimes:pdf|max:5012',
            'keterangan' => 'required',
            'skill' => 'required',
            'profesi' => 'required'
        ];
    }
}