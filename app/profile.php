<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
   protected $fillable =['user_id','location','birthday','phone','bio','cover_pic'];
   
   public function user()
   {
   	return $this ->belongsTo('App\User');
   }
}
