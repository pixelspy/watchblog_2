<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments';
  protected $fillable = ['comment', 'article_id', 'user_id'];


  // one comment has one artcle
  public function article()
  {
      return $this->belongsTo('App\Article');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
