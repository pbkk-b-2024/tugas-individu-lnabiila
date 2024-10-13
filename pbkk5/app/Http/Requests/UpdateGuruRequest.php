<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSiswaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $siswaId = $this->route('siswa')->id;

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
