<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, Searchable;
    
    protected $table = 'kelas'; // Explicitly set the table name if necessary

    protected $fillable = [
        'nama',
    ];
    
    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_kelas', 'siswa_id', 'kelas_id'); // Explicitly define the pivot table name
    }

    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'kelas_guru', 'kelas_id', 'guru_id'); // Explicitly define the pivot table name
    }

        public function jadwals()
    {
        return $this->hasMany(Jadwal::class); // Explicitly define the pivot table name
    }
}
