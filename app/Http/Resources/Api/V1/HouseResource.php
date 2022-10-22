<?php

namespace App\Http\Resources\Api\V1;

use App\Utils\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
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
            'price' => Currency::convertCent($this->price),
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'stores' => $this->stores,
            'garages' => $this->garages,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
