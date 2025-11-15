<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'user_id',
        'original_name',
        'drive_id',
        'drive_link',
        'mime',
    ];
}
