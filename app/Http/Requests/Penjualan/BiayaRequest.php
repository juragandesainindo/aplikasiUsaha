<?php

namespace App\Http\Requests\Penjualan;

use Illuminate\Foundation\Http\FormRequest;

class BiayaRequest extends FormRequest
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
            'title_biaya'       => 'nullable',
            'jumlah_biaya'      => 'nullable',
            'periode_id'        => 'required',
            'datausaha_id'      => 'required',
        ];
    }
}