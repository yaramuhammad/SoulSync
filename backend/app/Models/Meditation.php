<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meditation extends Model
{
    use HasFactory;
    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->attributes['image']);
    }
}
