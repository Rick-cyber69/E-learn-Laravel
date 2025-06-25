<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'video_url'];

    // 🔗 Users who purchased this course
    public function buyers()
    {
        return $this->belongsToMany(User::class, 'purchases')->withTimestamps();
    }
}
