<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWeeklyTip extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'weekly_tip_id', 'done', 'week', 'year'];

    public function weekly_tip()
    {
        return $this->belongsTo(WeeklyTip::class);
    }

}
