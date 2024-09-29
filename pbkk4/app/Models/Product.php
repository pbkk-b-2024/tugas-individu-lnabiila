<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Searchable;
    
    protected $table = 'products';

    protected $fillable = [
        'name',           
        'description',       
        'price',        
        'stock', 
        'link_picture',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
