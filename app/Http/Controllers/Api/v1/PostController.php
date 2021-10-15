<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\CreateCourseRequest;
use App\Http\Requests\Api\v1\CreatePostRequest;
use App\Http\Requests\Api\v1\UpdateCourseRequest;
use App\Http\Resources\Api\v1\CourseDetailsResource;
use App\Http\Resources\Api\v1\CourseResource;
use App\Http\Resources\Api\v1\PostResource;
use App\Models\Course;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function index()
    {
        return  PostResource::collection(Auth::user()->posts);
    }

    public function store(CreatePostRequest $request)
    {
        $items = $request->validated();
        $items['user_id'] = $request->user()->id;

        $post = Post::create($items);

        foreach($items['images'] as $image) {
            $img = new PostImage([
                'image' => UploadFileHelper::upload($image, 'post_images')
            ]);
            $post->images()->save($img);
        }

        return [
            'success' => true,
            'message' => 'پست با موفقیت اضافه شد',
            'data' => new PostResource($post)
        ];
    }


    public function show($id)
    {
        return new PostResource(Post::findOrFail($id));
    }



    public function update(UpdateCourseRequest $request, $id)
    {
        $items = $request->validated();

        $course = Post::findOrFail($id);

        if($request->has('image')) {
            UploadFileHelper::delete($course->image);
            $items['image'] = UploadFileHelper::upload($items['image'], 'post_images');
        }
        $course->update($items);

        return  [
            'success' =>  true,
            'message' => 'پست با موفقیت ویرایش شد'
        ];
    }


    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return  [
            'success' =>  true,
            'message' => 'پست با موفقیت حذف شد'
        ];
    }

    public function likePost($id)
    {
        $post = Post::findOrFail($id);
        Auth::user()->toggleLike($post);
        return [
            'success' => true,
            'is_liked' => Auth::user()->hasLiked($post)
        ];
    }


}
