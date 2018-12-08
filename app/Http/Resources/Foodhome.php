<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Foodhome extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'map_x' => $this->map_x,
            'map_y' => $this->map_y,
//            'categories' => Categorie::collection($this->whenLoaded('categories')),
        ];
    }
}
