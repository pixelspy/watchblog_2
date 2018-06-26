<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $table = 'articles';
  protected $fillable = ['title', 'body', 'category_id', 'article_id', 'user_id'];


  public function category() {
      return $this->belongsTo('App\Category');
  }

  // one article has many tags
  public function tags()
  {
      return $this->hasMany('App\Tag');
      // return $this->belongsToMany('App\Tag')->withTimestamps();
  }

  public function comments()
  {
      return $this->hasMany('App\Comment');
  }

  // one article belongs to one user
  public function user()
  {
      return $this->belongsTo('App\User');
  }


}
