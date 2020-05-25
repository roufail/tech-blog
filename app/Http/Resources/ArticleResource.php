<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'title'      => $this->title,
            'body'       => $this->body,
            'user_id'    => $this->user_id,
            'user'       => new UserResource($this->user),
            'created'    => $this->created_at->diffForHumans(),
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
            'author' => 'osama said'
        ];
    }
}
