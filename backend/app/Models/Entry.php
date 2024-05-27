<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    public function activities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Activity::class,'entry_activity');
    }

    public function reasons(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Reason::class,'entry_reason');
    }

    public function primary_emotion()
    {
        return $this->belongsTo(Emotion::class);
    }
    public function secondary_emotion()
    {
        return $this->belongsTo(SecondaryEmotion::class);
    }
}
