<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficeSpaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'slug' => $this->slug,
            'duration' => $this->duration,
            'price' => $this->price,
            'rating' => $this->rating,
            'is_popular' => $this->is_popular,
            'thumbnail' => $this->thumbnail,
            'about' => $this->about,
            'city' => new CityResource($this->whenLoaded('city')),
            'photos' => OfficeSpacePhotoResource::collection($this->whenLoaded('photos')),
            'benefits' => OfficeSpaceBenefitResource::collection($this->whenLoaded('benefits')),
        ];
    }
}
