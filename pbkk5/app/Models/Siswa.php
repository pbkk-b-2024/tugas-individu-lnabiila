<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory, Searchable;
    
    protected $table = 'siswa';

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_telp',
        'nama_ortu',
        'no_telp_ortu',
        'foto',
        'kelas',
    ];

    public function kelass()
    {
        return $this->belongsToMany(Kelas::class, 'siswa_kelas','siswa_id', 'kelas_id'); // Explicitly define the pivot table name
    }
}
