<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    use Searchable;
    
    protected $table = 'barang';

    protected $fillable = [
        'kode',           
        'nama',       
        'stok',        
        'harga', 
        'kategori',
    ];

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'barang_kategori','barang_id', 'kategori_id'); // Explicitly define the pivot table name
    }
    
}
