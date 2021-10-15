<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\CreateCourseRequest;
use App\Http\Requests\Api\v1\UpdateCourseRequest;
use App\Http\Resources\Api\v1\CourseDetailsResource;
use App\Http\Resources\Api\v1\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{


    public function index()
    {
        return  CourseResource::collection(Auth::user()->courses);
    }

    public function store(CreateCourseRequest $request)
    {
        $items = $request->validated();
        $items['image'] = UploadFileHelper::upload($items['image'], 'course_images');
        $items['user_id'] = $request->user()->id;

        $course = Course::create($items);

        return [
            'success' => true,
            'message' => 'دوره با موفقیت اضافه شد',
            'data' => new CourseResource($course)
        ];
    }


    public function show($id)
    {
        return new CourseDetailsResource(Course::findOrFail($id));
    }



    public function update(UpdateCourseRequest $request, $id)
    {
        $items = $request->validated();

        $course = Course::findOrFail($id);

        if($request->has('image')) {
            UploadFileHelper::delete($course->image);
            $items['image'] = UploadFileHelper::upload($items['image'], 'course_images');
        }
        $course->update($items);

        return  [
            'success' =>  true,
            'message' => 'دوره با موفقیت ویرایش شد'
        ];
    }


    public function destroy($id)
    {
        Course::findOrFail($id)->delete();

        return  [
            'success' =>  true,
            'message' => 'دوره با موفقیت حذف شد'
        ];
    }
}
