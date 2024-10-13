<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory, Searchable;
    
    protected $table = 'guru';

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_telp',
        'foto',
    ];

    public function kelass()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_guru','kelas_id', 'guru_id'); // Explicitly define the pivot table name
    }
}
