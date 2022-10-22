<?php

namespace App\Http\Resources\Api\V1;

use App\Utils\Currency;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HouseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($record) {
                return [
                    'id' => $record->id,
                    'name' => $record->name,
                    'price' => Currency::convertCent($record->price),
                    'bedrooms' => $record->bedrooms,
                    'bathrooms' => $record->bathrooms,
                    'stores' => $record->stores,
                    'garages' => $record->garages,
                    'created_at' => $record->created_at,
                    'updated_at' => $record->updated_at
                ];
            }),
        ];
    }
}
