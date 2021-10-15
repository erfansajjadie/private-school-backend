<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostImageResource extends JsonResource
{

    public function toArray($request)
    {
        return asset('storage/' . $this->image);
    }
}
