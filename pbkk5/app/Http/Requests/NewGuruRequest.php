<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
public function rules(): array
{
    return [
            'nama_depan' => 'required|string|max:20',
            'nama_belakang' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:perempuan,laki-laki',
            'email' => 'required|string|email',
            'no_telp' => 'required|string|max:15',
            'foto' => 'required|file|mimes:jpg,png,jpeg',
            'kelas' => 'required|array',
            'kelas.*' => 'exists:kelas,id',
        ];
    }

}
