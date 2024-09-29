<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Izinkan semua pengguna untuk update user
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        // Ambil userId dari route untuk memastikan email unik kecuali untuk user yang sedang diupdate
        $userId = $this->route('user')->id;

        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('user')->ignore($userId)], // Email harus unik kecuali user yang diupdate
            'password' => ['nullable', 'confirmed', Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers(),
            ],
            'role' => 'required|array',
            'role.*' => 'exists:role,id',
        ];
    }
}
