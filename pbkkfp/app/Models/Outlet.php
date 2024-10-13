<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;

class Outlet extends Model
{
    use HasFactory, Searchable;

    protected $table = "outlets";
    protected $fillable = ["name", "address", "open_hour", "close_hour"];
}
