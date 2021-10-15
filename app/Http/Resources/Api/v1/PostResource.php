<?php

namespace App\Http\Resources\Api\v1;

use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'images' => PostImageResource::collection($this->images),
            'likes_count' => $this->likes()->count(),
            'is_liked' => Auth::user()->hasLiked(Post::find($this->id)) ?? false
        ];
    }
}
