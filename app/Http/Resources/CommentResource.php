<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
        'id' => $this->id,
        'body' => $this->body,
        'child' => !is_null($this->parent_id),
        'parent_id' => $this->parent_id,
        'owner' => optional($request->user())->id === $this->user_id,
        'children' => CommentResource::collection($this->whenLoaded('children')),
      ];
    }
}
