<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog_comments extends Model
{
   protected $guarded = [];

   protected $table = 'blog_comments';

   protected  $fillable =  [
      'blog_id',
      'comment',
      'name',
      'email'
   ];
}
