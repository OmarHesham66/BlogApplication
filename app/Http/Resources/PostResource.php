<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'media' => asset($this->media),
            'created_at' => date_format($this->created_at, 'Y-m-d'),
            'author' => $this->whenLoaded('user', UserResource::make($this->user)),
            'category' => $this->whenLoaded('category', CategoryResource::make($this->category)),
        ];
    }
}
