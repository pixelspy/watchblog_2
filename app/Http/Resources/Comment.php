<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
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
          'comment' => $this->comment,
          'created_at' => (string)$this->created_at,
          'updated_at' => (string)$this->updated_at,
          'article_id' => $this->article_id,
          'user' => $this->user
        ];
    }
}
