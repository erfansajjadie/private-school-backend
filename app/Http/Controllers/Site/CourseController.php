<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('user:id,user_name')->paginate(30);


        return view('site.course.courses_list', compact('courses'));
    }
}
