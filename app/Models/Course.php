<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'course_category_id',
        'course',
        'description',
        'duration',
        'course_level',
        'course_type',
        'duration_type',
        'logo',
    ];

    protected $table = 'courses';
}
