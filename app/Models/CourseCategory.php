<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_category',
        'logo',
    ];

    protected $table = 'course_categories';

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function universities()
    {
        return $this->hasMany(University::class);
    }

    public function colleges()
    {
        return $this->hasMany(College::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function getCourseCategories($request)
    {
        $courceCategories = CourseCategory::select('course_categories.id', 'course_categories.course_category', 'course_categories.logo')->LEFTJOIN('courses','course_categories.id','=','courses.course_category_id');

        if($request['search']) {
            $courceCategories->where('course_categories.course_category', 'like', '%'.$request['search'].'%');
        }
        if($request['course_mode']) {
            $courceCategories->where('courses.course_mode', 'like', '%'.$request['course_mode'].'%');
        }

        if($request['duration_type']) {
            $courceCategories->where('courses.duration_type', 'like', '%'.$request['duration_type'].'%');
        }

        if($request['university']) {
            $courceCategories->LEFTJOIN('universities','courses.university','=','universities.id')->where('universities.university', 'like', '%'.$request['university'].'%');
        }

        if($request['college']) {
            $courceCategories->LEFTJOIN('college_courses','courses.id','=','college_courses.course_id')->LEFTJOIN('colleges','college_courses.college_id','=','colleges.id')->where('colleges.college', 'like', '%'.$request['college'].'%');
        }

        return $courceCategories->groupBy('course_categories.id','course_categories.course_category', 'course_categories.logo');
        // return CourseCategory::select('course_categories.id', 'course_categories.course_category', 'course_categories.logo')->LEFTJOIN('courses', 'course_categories.id', '=', 'courses.course_category_id')->groupBy('course_categories.id')->get();
    }
}
