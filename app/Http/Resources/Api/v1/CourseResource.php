<?php

namespace App\Http\Resources\Api\v1;

use App\Helpers\Utils;
use App\Models\Course;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CourseResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'author_name' => $this->user->fullname,
            'image' => asset('storage/'. $this->image),
            'price' => Utils::format_price($this->price()),
            'regular_price' => Utils::format_price($this->price),
            'has_discount' => $this->discount > 0,
            'is_purchased' => (!(Auth::user() === null) && Auth::user()->hasPurchasedCourse($this->id)) || $this->price() === 0,
        ];
    }
}
