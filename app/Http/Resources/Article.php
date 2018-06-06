<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

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
          // 'category_id' => $this->category_id,
          'category' => [
              'name' => $this->category->name
          ],
        ];
    }

    public function with($request) { // can add other elements wiht the data
        return [
            'version' => '1.0.0',
            'author_url' => url('http://mahana.com')
        ];
    }
}
