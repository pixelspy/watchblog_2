<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

  protected $table = 'tags';
  protected $fillable = ['name', 'user_id', 'article_id'];


  // one tag has many artcles
  public function articles()
  {
      return $this->belongsToMany('App\Article')->withTimestamps();
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
