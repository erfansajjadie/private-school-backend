<?php

namespace App\Http\Controllers\Site;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CreateCourseRequest;
use App\Http\Requests\Site\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CourseController extends Controller
{
    public function index()
    {
        if(Route::currentRouteName() === 'courses-list') {
            $courses = Course::with('user:id,user_name')->paginate(30);
            return view('site.course.courses_list', compact('courses'));
        }

        $courses = Auth::user()->courses()->with('topics')->paginate(30);
        return view('site.user.user_courses', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::with('user:id,user_name,profile_image,is_private,private_price', 'topics')->findOrFail($id);

        return view('site.course.course_details', compact('course'));
    }

    public function create()
    {
        return view('site.course.create_course');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        UploadFileHelper::delete($course->image);

        $course->delete();

        return [
          'success' => true,
          'message' => 'دوره با موفقیت حذف شد'
        ];
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('site.course.update_course', compact('course'));
    }

    public function store(CreateCourseRequest $request)
    {
        $items = $request->validated();
        $items['image'] = UploadFileHelper::upload($items['image'], 'course_images');
        $course = new Course($items);
        Auth::user()->courses()->save($course);

        $request->session()->flash('alert-success', 'دوره با موفقیت ایجاد شد');

        return redirect()->route('user-courses');
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $items = $request->validated();

        $course = Course::findOrFail($id);

        if(array_key_exists('image', $items)) {
            UploadFileHelper::delete($course->image);
            $items['image'] = UploadFileHelper::upload($items['image'], 'course_images');
        }

        $course->update($items);

        $request->session()->flash('alert-success', 'دوره با موفقیت ویرایش شد');

        return redirect()->route('user-courses');
    }
}
