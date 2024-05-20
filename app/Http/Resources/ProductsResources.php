<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ,
            'category_id' => $this->category_id ,
            'name' => $this->name ,
            'description' => $this->description ,
            'quantity' => $this->quantity ,
            'price' => $this->price ,
            'image' =>env('APP_URL') . '/storage/' . $this->image
        ];
    }
}
