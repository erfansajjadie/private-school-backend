<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users_count = User::all()->count();
        $courses_count = Course::all()->count();
        $posts_count = Post::all()->count();
        $teachers_count = User::whereHas('courses')->count();
        $courses = Course::with('user')->orderBy('id', 'desc')->take(10)->get();
        $posts = Post::with('images', 'user')
            ->withCount('likes')
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();
        $users = User::whereHas('courses')->with('category')->orderBy('id', 'desc')->take(10)->get();

        return view('home', compact(
            'users_count',
            'courses_count',
            'posts_count',
            'teachers_count',
            'posts',
            'courses',
            'users'
        ));
    }

    public function searchUsers($keyword)
    {

        $users = User::where('first_name', 'LIKE' , '%' . $keyword . '%')
            ->orWhere('last_name', 'LIKE' , '%' . $keyword . '%')
            ->orWhere('user_name', 'LIKE' , '%' . $keyword . '%')
            ->orWhere('phone', 'LIKE' , '%' . $keyword . '%')
            ->orWhereHas('category', function ($query) use ($keyword){
                $query->where('name', 'like', '%'.$keyword.'%');
            })
            ->orWhereHas('courses', function ($query) use ($keyword){
                $query->where('name', 'like', '%'.$keyword.'%');
            })->get(['id', 'user_name', 'profile_image'])->map(function ($user) {
                $route = route('user-details', $user->id);
                $image = asset('storage/' . $user->profile_image);
                return "<li>
                    <a href='{$route}'>
                        <span class='thumb' style='background-image:url({$image});'></span>
                        <span class='title'>{$user->user_name}</span>
                    </a></li>";
            });
        $courses = Course::where('name', 'like', '%'.$keyword.'%')
            ->get(['id', 'name', 'image'])->map(function ($course) {
                $route = route('course-details', $course->id);
                $image = asset('storage/' . $course->image);
                return "<li>
                    <a href='{$route}'>
                        <span class='thumb' style='background-image:url({$image});'></span>
                        <span class='title'>{$course->name}</span>
                    </a></li>";
            });

        $data = $users->implode('') . $courses->implode('');

        return "<ul>{$data}</ul>";
    }

}
