<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    use HasFactory;

    public function secondaryEmotions()
    {
        return $this->hasMany(SecondaryEmotion::class, 'parent_id');
    }
}
