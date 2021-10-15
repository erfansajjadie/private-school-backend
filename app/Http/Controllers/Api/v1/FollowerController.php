<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function getFollowers($id)
    {
        return UserResource::collection(User::findOrFail($id)->followers);
    }

    public function getFollowings($id)
    {
        return UserResource::collection(User::findOrFail($id)->followings);
    }

    public function follow($id)
    {
        $user = User::findOrFail($id);
        Auth::user()->toggleFollow($user);
        return [
            'success' => true,
            'message' => Auth::user()->isFollowing($user) ? 'Followed' : 'Unfollowed'
        ];
    }


}
