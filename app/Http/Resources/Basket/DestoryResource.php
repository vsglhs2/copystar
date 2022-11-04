<?php

namespace App\Http\Resources\Basket;

use Illuminate\Http\Resources\Json\JsonResource;

class DestoryResource extends JsonResource
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
            'message' => 'deleted'
        ];
    }
}
