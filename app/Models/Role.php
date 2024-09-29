<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    use Searchable;
    
    protected $table = 'role'; // Explicitly set the table name if necessary

    protected $fillable = [
        'name',
    ];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
