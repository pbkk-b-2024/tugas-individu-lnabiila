<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory, Searchable;
    
    protected $table = 'jadwal'; // Explicitly set the table name if necessary

    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_Selesai'
    ];
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class); // Explicitly define the pivot table name
    }

        public function ruang()
    {
        return $this->belongsTo(Ruang::class); // Explicitly define the pivot table name
    }
}
