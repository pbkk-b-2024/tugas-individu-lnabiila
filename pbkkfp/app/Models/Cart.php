<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;

class Cart extends Model
{
    use HasFactory, Searchable;

    protected $table = "carts";
    protected $fillable = ["user_id", "menu_id", "quantity"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
