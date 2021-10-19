<?php

namespace App\Http\Resources\Api\v1;

use App\Helpers\Utils;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CourseDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $is_owner = $this->user->id === Auth::user()->id;

        return [
            'id' => $this->id,
            'description' => $this->description,
            'topics' => TopicResource::collection($this->topics),
            'is_private' => !$is_owner && $this->user->is_private === 1 && !Auth::user()->hasPurchasedPrivate($this->user->id),
            'private_price' => Utils::format_price($this->user->private_price),
            'user_id' => $this->user->id
        ];
    }
}
