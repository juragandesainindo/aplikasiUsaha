<?php

namespace App\Http\Requests\Pembelian;

use Illuminate\Foundation\Http\FormRequest;

class BuahEditRequest extends FormRequest
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
            'nama_supplier'       => 'nullable',
            'harga_super'         => 'nullable',
            'tonase_super'        => 'nullable',
            'harga_bulat'         => 'nullable',
            'tonase_bulat'        => 'nullable',
            'harga_sortiran'      => 'nullable',
            'tonase_sortiran'     => 'nullable',
            'total_super'         => 'nullable',
            'total_bulat'         => 'nullable',
            'total_sortiran'      => 'nullable',
            'total_biaya_beli'    => 'nullable',
            'total_tonase_beli'   => 'nullable',
        ];
    }
}