<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ProfileRequest;
use App\Http\Resources\Api\v1\PaymentResource;
use App\Http\Resources\Api\v1\ProfileResource;
use App\Http\Resources\Api\v1\SaleResource;
use App\Http\Resources\Api\v1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(ProfileRequest $request)
    {
        $items = $request->validated();

        if($request->has('profile_image')) {
            if ($request->user()->profile_image !== null) {
                UploadFileHelper::delete($request->user()->profile_image);
            }
            $items['profile_image'] = $request->file('profile_image')
                ->store('profile_images', ['disk' => 'public']);
        }

        $request->user()->update($items);

        return [
            'success' => true,
            'message' => 'پروفایل با موفقیت ویرایش شد',
            'data' => new UserResource($request->user())
        ];
    }

    public function getProfile()
    {
        return new ProfileResource(Auth::user());
    }

    public function getUserDetails($id)
    {
        return new ProfileResource(User::findOrFail($id));
    }

    public function getFollowings()
    {
        return UserResource::collection(Auth::user()->followings()->paginate(20));
    }

    public function getPayments()
    {
        return [
            'data' => [
                'courses' => PaymentResource::collection(Auth::user()->payments)
            ]
        ];
    }

    public function getSales()
    {
        return SaleResource::collection(Auth::user()->sales);
    }
}
