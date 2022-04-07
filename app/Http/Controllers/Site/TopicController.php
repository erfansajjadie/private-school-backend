<?php

namespace App\Http\Controllers\Site;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CreateTopicRequest;
use App\Http\Requests\Site\UpdateTopicRequest;
use App\Models\Course;
use App\Models\CourseTopic;
use Illuminate\Http\Request;

class TopicController extends Controller
{


    public function create($id)
    {
        $course = Course::findOrFail($id);
        return view('site.topic.create_topic', compact('course'));
    }


    public function store(CreateTopicRequest $request, $id)
    {
        $items = $request->validated();
        $items['file'] = UploadFileHelper::upload($items['file'], 'course_files');
        $course = Course::findOrFail($id);
        $course->topics()->save(new CourseTopic($items));

        $request->session()->flash('alert-success', 'جلسه با موفقیت ایجاد شد');

        return redirect()->route('user-courses');
    }



    public function edit($id)
    {
        $topic = CourseTopic::findOrFail($id);
        return view('site.topic.edit_topic', compact('topic'));
    }


    public function update(UpdateTopicRequest $request, $id)
    {
        $items = $request->validated();
        $topic = CourseTopic::findOrFail($id);

       
        $topic->update($items);

        $request->session()->flash('alert-success', 'جلسه با موفقیت ویرایش شد');

        return redirect()->route('user-courses');
    }


    public function destroy($id)
    {
        $topic = CourseTopic::findOrFail($id);

        UploadFileHelper::delete($topic->file);

        $topic->delete();

        return [
            'success' => true,
            'message' => 'جلسه با موفقیت حذف شد'
        ];
    }
}
