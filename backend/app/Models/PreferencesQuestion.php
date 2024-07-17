<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferencesQuestion extends Model
{
    use HasFactory;

    protected $primaryKey = 'tag';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['tag', 'question'];
}
