<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendship extends Model
{
    protected $fillable =['id_user_requesting', 'id_user_requested' ,'status'];
}
