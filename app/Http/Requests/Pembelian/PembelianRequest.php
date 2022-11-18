<?php

namespace App\Http\Requests\Pembelian;

use Illuminate\Foundation\Http\FormRequest;

class PembelianRequest extends FormRequest
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
            'nama_supplier'     => 'nullable',
            'nama_barang'       => 'nullable',
            'harga_super'       => 'nullable',
            'tonase_super'      => 'nullable',
            'total_super'       => 'nullable',
            'periode_id'        => 'required',
            'datausaha_id'      => 'required',
        ];
    }
}