<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'college',
        'place',
        'university',
        'established',
        'description',
        'banner_image',
        'logo',
    ];

    public function getColleges($search, $course,$course_name,$university,$page, $limit){
        // $colleges = College::select('colleges.id', 'colleges.college', 'cities.name as place', 'colleges.logo','colleges.established', DB::raw('SELECT AVG(college_courses.ranking) AS average_ranking FROM college_courses WHERE college_courses.college_id = colleges.id'))->LEFTJOIN('cities', 'colleges.place', '=', 'cities.id');
        $colleges = College::select('colleges.id', 'colleges.college', 'cities.name as place', 'colleges.logo', 'colleges.established', DB::raw('ROUND((SELECT AVG(ranking) FROM college_courses WHERE college_courses.college_id = colleges.id), 2) as average_ranking'))
        ->leftJoin('cities', 'colleges.place', '=', 'cities.id');
        if ($search) {
            $colleges->where('colleges.college', 'like', '%' . $search . '%');
        }
        if($university){
            $colleges->where('colleges.university', $university);
        }
        if ($course || $course_name) {
            $colleges->LEFTJOIN('college_courses', 'colleges.id', '=', 'college_courses.college_id')->LEFTJOIN('courses', 'courses.id', '=', 'college_courses.course_id');
        }
        if ($course) {
            $colleges->where('courses.id', $course);
        }
        if ($course_name) {
            $colleges->where('courses.course', 'like', '%' . $course_name . '%');
        }
       return $colleges->groupBy('colleges.id', 'colleges.college', 'cities.name', 'colleges.logo','colleges.established');
    }
}
