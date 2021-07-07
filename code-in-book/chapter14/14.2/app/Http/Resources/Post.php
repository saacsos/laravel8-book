<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $tags = $this->tags->pluck('name');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'detail' => $this->detail,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ],
            'tags' => $tags
        ];
    }
}
