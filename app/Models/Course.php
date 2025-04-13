<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'link_zoom',
        'description_ar',
        'description_en',
        'file',
        'video',
        'code',
        'price',
        'status',
        'stage_id',
        'grade_id',
    ];

    protected $casts = [
        'image' => 'array',
        'file' => 'array',
        'video' => 'array',
    ];
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users')->withTimestamps();
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'course_instructors')->withTimestamps();
    }
}
