<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use Searchable;
    
    protected $table = 'kategori'; // Explicitly set the table name if necessary

    protected $fillable = [
        'nama',
    ];
    
    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'barang_kategori', 'kategori_id', 'barang_id'); // Explicitly define the pivot table name
    }
}
