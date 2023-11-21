<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;
    protected $fillable = ["image_src", "price"];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
