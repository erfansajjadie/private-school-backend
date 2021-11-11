<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseTopic;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $topics = CourseTopic::with('course.user')->get();
        return view('admin.file.file-list', compact('topics'));
    }
}
