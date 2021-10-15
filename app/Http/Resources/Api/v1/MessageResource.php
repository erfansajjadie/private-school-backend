<?php

namespace App\Http\Resources\Api\v1;

use App\Helpers\Utils;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class MessageResource extends JsonResource
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
            'user_name' => $this->sender->user_name,
            'profile_image' => Utils::get_profile_image($this->sender->profile_image),
            'text' => $this->text,
            'is_owner' => $this->sender_id === Auth::user()->id || $this->receiver_id === Auth::user()->id,
            'responses' =>  self::collection($this->response)
        ];
    }
}
