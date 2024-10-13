<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory, Searchable;
    
    protected $table = 'ruang'; // Explicitly set the table name if necessary

    protected $fillable = [
        'nama',
        'kapasitas'
    ];
    
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class); // Explicitly define the pivot table name
    }
}
