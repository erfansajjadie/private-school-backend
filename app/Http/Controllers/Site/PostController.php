<?php

namespace App\Http\Controllers\Site;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CreatePostRequest;
use App\Http\Requests\Site\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    public function index()
    {
        if(Route::currentRouteName() === 'posts-list') {
            $posts = Post::with('user:id,user_name,profile_image')->orderBy('id', 'desc')->get();
            return view('site.post.post_list', compact('posts'));
        }

        $posts = Auth::user()->posts()
            ->with('images')
            ->withCount('likes')
            ->orderBy('id', 'desc')
            ->get();

        return view('site.post.user_posts', compact('posts'));

    }

    public function show($id)
    {
        $post = Post::with('user:id,user_name,profile_image', 'images')
            ->withCount('likes')
            ->findOrFail($id);

        return view('site.post.post_details', compact('post'));
    }


    public function create()
    {
        return view('site.post.create_post');
    }

    public function store(CreatePostRequest $request)
    {
        $items = $request->validated();
        $post = new Post($items);
        Auth::user()->posts()->save($post);

        foreach($items['images'] as $image) {
            $img = new PostImage([
                'image' => UploadFileHelper::upload($image, 'post_images')
            ]);
            $post->images()->save($img);
        }

        $request->session()->flash('alert-success', 'پست با موفقیت ایجاد شد');

        return redirect()->route('user-posts');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return  [
            'success' =>  true,
            'message' => 'پست با موفقیت حذف شد'
        ];
    }

    public function edit($id)
    {
        $post = Post::with('images')->findOrFail($id);
        return view('site.post.update_post', compact('post'));
    }


    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $items = $request->validated();

        if($request->has('images')) {
            foreach($items['images'] as $image) {
                $img = new PostImage([
                    'image' => UploadFileHelper::upload($image, 'post_images')
                ]);
                $post->images()->save($img);
            }
        }

        $post->update($items);

        $request->session()->flash('alert-success', 'پست با موفقیت ویرایش شد');

        return redirect()->route('user-posts');

    }


    public function deletePostImage($id)
    {
        PostImage::findOrFail($id)->delete();

        return  [
            'success' =>  true,
            'message' => 'عکس با موفقیت حذف شد'
        ];
    }

    public function like($id)
    {
        $post = Post::findOrFail($id);

        Auth::user()->toggleLike($post);

        return redirect()->route('post-details', $post->id);
    }
}
