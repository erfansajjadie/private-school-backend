<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\TopicRequest;
use App\Http\Resources\Api\v1\TopicResource;
use App\Models\CourseTopic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function index($id)
    {

    }


    public function store(TopicRequest $request)
    {
        $items = $request->validated();

        if($request->has('file')) {
            $items['file'] = UploadFileHelper::upload($items['file'], 'course_files');
        }

        $topic = CourseTopic::create($items);



        return [
            'success' => true,
            'message' => 'موضوع با موفقیت اضافه شد',
            'data' => new TopicResource($topic)
        ];
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

        $course = CourseTopic::findOrFail($id);
        UploadFileHelper::delete($course);
        $course->delete();

        return [
          'success' => true,
          'message' => 'موضوع با موفقیت حذف شد'
        ];
    }
}
