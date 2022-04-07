<?php

namespace App\Http\Controllers\Site;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{


    public function index()
    {
        $users = User::with('category')->get();

        return view('site.user.users_list', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('courses', 'posts.images', 'category')->findOrFail($id);

        return view('site.user.user_details', compact('user'));
    }

    public function edit()
    {
        return view('site.user.update_profile');
    }



    public function update(ProfileRequest $request)
    {
        $items = $request->validated();

        if($request->has('profile_image')) {
            if ($request->user()->profile_image !== null) {
                UploadFileHelper::delete($request->user()->profile_image);
            }
            $items['profile_image'] = UploadFileHelper::upload($items['profile_image'], 'profile_images');
        }

        if(Auth::user()->user_name !== $items['user_name']) {
            if(User::where('user_name', $items['user_name'])->exists()) {
                return Redirect::back()->withErrors(['msg' => 'نام کاربری از قبل وجود دارد']);
            }
        }

        $user = Auth::user()->update($items);

        $request->session()->flash('alert-success', 'اطلاعات با موفقیت ویرایش شد');


        return redirect()->route("edit-profile");
    }



    public function follow($id)
    {
        $user = User::findOrFail($id);
        Auth::user()->toggleFollow($user);

        return redirect()->route('user-details', $user->id);
    }

}
