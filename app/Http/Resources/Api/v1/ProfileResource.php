<?php

namespace App\Http\Resources\Api\v1;

use App\Helpers\Utils;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = User::find($this->id);
        $is_owner = $this->id === Auth::user()->id;
        return [
            'id' => $this->id,
            'full_name' => $this->first_name === null ? 'کاربر مهمان ' : $this->first_name . ' ' . $this->last_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_name' => $this->user_name,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name ?? "",
            'sheba' => $this->sheba,
            'is_private' => !$is_owner && $this->is_private === 1 && !Auth::user()->hasPurchasedPrivate($this->id),
            'private_price' => Utils::format_price($this->private_price),
            'private' => $this->is_private === 1,
            'is_private_purchased' => Auth::user()->hasPurchasedPrivate($this->id),
            'followers_count' => $this->followers()->count(),
            'following_count' => $this->followings()->count(),
            'is_following' => auth('sanctum')->check() ? auth('sanctum')->user()->isFollowing($user) : false,
            'is_followed' => auth('sanctum')->check() ? auth('sanctum')->user()->isFollowedBy($user) : false,
            'profile_image' => $this->profile_image === null ? Utils::$PROFILE_IMAGE : asset('storage/' . $this->profile_image),
            'courses' => CourseResource::collection($this->courses),
            'posts' => PostResource::collection($this->posts),
            'comments' => MessageResource::collection($this->messages),
        ];
    }

}
