<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Return true if all users are allowed to make this request.
        // You can add additional authorization logic here.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        // Get the current Buku instance from the route
        $barangId = $this->route('barang')->id;

        return [
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategori,id',
        ];
    }
}
