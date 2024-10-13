<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'nama_depan' => $this->nama_depan,
            'nama_belakang' => $this->nama_belakang,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'nama_ortu' => $this->nama_ortu,
            'no_telp_ortu' => $this->no_telp_ortu,
        ];

    }
}
