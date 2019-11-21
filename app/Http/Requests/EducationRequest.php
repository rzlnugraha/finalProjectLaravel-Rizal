<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
        $max = date('Y');
        return [
            'user_id' => 'required',
            'sekolah' => 'required',
            'angkatan' => 'required|numeric|',
            'lulus_tahun' => 'required|numeric|max:'.$max,
            'pendidikan' => 'required',
        ];
    }
}
