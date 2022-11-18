<?php

namespace App\Http\Requests\Penjualan;

use Illuminate\Foundation\Http\FormRequest;

class DagangRequest extends FormRequest
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
            'nama_penjual'      => 'nullable',
            'harga_jual'        => 'nullable',
            'tonase_jual'       => 'nullable',
            'total_jual'        => 'nullable',
            'pembelian_id'      => 'required',
            'periode_id'        => 'required',
            'datausaha_id'      => 'required',
        ];
    }
}