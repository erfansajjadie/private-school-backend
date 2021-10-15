<?php

namespace App\Http\Resources\Api\v1;

use App\Helpers\Utils;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->first_name === null ? 'کاربر مهمان ' : $this->first_name . ' ' . $this->last_name,
            'profile_image' => $this->profile_image === null ? Utils::$PROFILE_IMAGE : asset('storage/' . $this->profile_image),
            'user_name' => $this->user_name,
            'phone' => $this->phone,
            'category_name' => $this->category->name ?? "",
        ];
    }
}
