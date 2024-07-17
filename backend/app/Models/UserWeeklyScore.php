<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWeeklyScore extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'weekly_aspect_id', 'score', 'week', 'year'];
}
