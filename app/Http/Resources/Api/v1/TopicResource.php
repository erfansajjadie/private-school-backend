<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class TopicResource extends JsonResource
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
            'approved' => $this->approved === 1,
            'title' => $this->title,
            'file' => $this->when(
                Auth::user()->hasPurchasedCourse($this->course_id) || Auth::user()->id === $this->course->user->id,
                asset('storage/' . $this->file)
            ),
            'type' => pathinfo(asset("storage/" . $this->file))['extension'] ?? ''
        ];
    }
}
