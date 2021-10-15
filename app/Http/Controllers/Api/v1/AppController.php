<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\CategoryResource;
use App\Http\Resources\Api\v1\CourseResource;
use App\Http\Resources\Api\v1\UserResource;
use App\Models\Category;
use App\Models\Course;
use App\Models\Download;
use App\Models\User;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    public function searchUsers(Request $request)
    {
        $users = User::where('id', 1);
        $courses = Course::where('id', 2);
        if($request->has('keyword')) {
            $users = User::where('first_name', 'LIKE' , '%' . $request->keyword . '%')
                ->orWhere('last_name', 'LIKE' , '%' . $request->keyword . '%')
                ->orWhere('user_name', 'LIKE' , '%' . $request->keyword . '%')
                ->orWhere('phone', 'LIKE' , '%' . $request->keyword . '%')
                ->orWhereHas('category', function ($query) use ($request){
                    $query->where('name', 'like', '%'.$request->keyword.'%');
                })
                ->orWhereHas('courses', function ($query) use ($request){
                    $query->where('name', 'like', '%'.$request->keyword.'%');
                });
            $courses = Course::where('name', 'like', '%'.$request->keyword.'%');
        }
        return [
            'users' => UserResource::collection($users->get()),
            'course' => CourseResource::collection($courses->get())
        ];
    }

    public function getCategories()
    {
        return CategoryResource::collection(Category::all());
    }

    public function checkVersion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'version' => 'required',
            'os' => 'nullable',
            'device_id' => 'nullable',
            'device_brand' => 'nullable',
            'device_name' => 'nullable',
            'build_number' => 'nullable',
            'local' => 'nullable',
            'system_version' => 'nullable',
            'device_width' => 'nullable',
            'device_height' => 'nullable',
            'notch_height' => 'nullable',
            'total_memory' => 'nullable',
        ]);
        if($validator->fails()){
            return [
                'success' => false,
                'message' => 'دقت کنید'
            ];
        }

        $download = Download::where('device_id' , $request->device_id)->first();
        if($download) {
            $download->update([
                'count'=> DB::raw('count+1'),
                'version'=> $request->version,
                'push_token'=> $request->push_token,
                'updated_at' => Carbon::now()
            ]);
        }else {
            Download::create($request->all());
        }


        $version = Version::latest()->first();

        if($request->version < $version->version) {
            return response()->json([
                'status' => 26,
                'message' => "نسخه جدید از برنامه منتشر شد",
                'version' => $version
            ], 200);
        }else {
            return response()->json([
                'status' => 200,
                'message' => "آخرین نسخه نصب هست",
                'version' => $version
            ], 200);
        }


    }

}
