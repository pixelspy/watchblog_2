<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Tag as TagResource;
use App\Http\Resources\Comment as CommentResource;

class Article extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request); // returns everything by default
        return [
          'id' => $this->id,
          'title' => $this->title,
          'body' => $this->body,
          'created_at' => (string)$this->created_at,
          'updated_at' => (string)$this->updated_at,

          'category' => $this->category,

          'user' => [
              'name' => $this->user->firstname . " " . $this->user->lastname
          ],

          'tags' => TagResource::collection($this->tags),
          'comments' => CommentResource::collection($this->comments),

          // 'comments' => $this->comments
        ];
    }

    public function with($request) { // can add other elements with the data
        return [
            'version' => '1.0.0',
            'author_url' => url('http://mahana.com')
        ];
    }
}
