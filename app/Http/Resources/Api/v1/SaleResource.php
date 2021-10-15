<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'course' => $this->course->name,
            'buyer' => $this->user->fullname,
            'price' => $this->price * 0.782,
            'discount' => $this->discount,
            'transaction_id' => $this->transaction_id,
            'date' => (verta($this->created_at))->format('Y-m-j H:i:s')
        ];
    }
}
