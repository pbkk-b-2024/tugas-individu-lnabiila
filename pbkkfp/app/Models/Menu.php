<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;

class Menu extends Model
{
    use HasFactory, Searchable;

    protected $table = "menus";
    protected $fillable = ["name", "type_id", "price", "original_price", "description", "photo"];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function order_menu(){
        return $this->hasMany(OrderMenu::class);
    }

    public function promo_menu(){
        return $this->hasMany(PromoMenu::class);
    }
}
