<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->category_id,
            'name' => $this->name,
            'displayName' => $this->display_name,
            'code' => $this->code,
            'imagePath' => $this->image_path,
            'description' => $this->description,
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
