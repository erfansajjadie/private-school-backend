<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseTopic;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $topics = CourseTopic::with('course.user')->paginate(20);
        return view('admin.file.file-list', compact('topics'));
    }

    public function changeStatus ($id, Request $request)
    {
        if($request->approve === 1)
            CourseTopic::findOrFail($id)->approve();
        else
            CourseTopic::findOrFail($id)->delete();

        return [
            'success' => true,
            'message' => 'وضعیت با موفقیت تغییر کرد'
        ];
    }
}
