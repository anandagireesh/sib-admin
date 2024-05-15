<?php

namespace App\Http\Controllers;

use App\Models\ApplyDetails;
use App\Models\CourseApplied;
use Illuminate\Http\Request;

class CourseAppliedController extends Controller
{
    public function appliedList(){
    $courseApplied = CourseApplied::select('users.first_name','users.last_name','users.phone_number','users.email','courses.course','colleges.college')->leftJoin('courses', 'course_applieds.course_id', '=', 'courses.id')
    ->leftJoin('colleges', 'course_applieds.college_id', '=', 'colleges.id')
    ->leftJoin('users', 'course_applieds.user_id', '=', 'users.id')
    ->orderBy('course_applieds.id', 'desc')
    ->get();

    return view('Admin.applied.coures_applied')->with('coursesApplied',$courseApplied);
    }

    public function othersAppliedList(){
        $courseApplied = ApplyDetails::select('users.first_name','users.last_name','users.phone_number','users.email','apply_details.apply_type')
        ->leftJoin('users', 'apply_details.user_id', '=', 'users.id')
        ->orderBy('apply_details.id', 'desc')
        ->get();

        return view('Admin.applied.others_applied')->with('coursesApplied',$courseApplied);
        }
}
