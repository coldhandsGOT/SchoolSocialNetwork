<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\traits\friendable;

class User extends Authenticatable
{
    use Notifiable;
    use friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'gender', 'avatar', 'email', 'password', 'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\profile');
    }

    public function getPhoto($w = null, $h = null){
        if (!empty($this->profile_path)){
            $path = 'storage/uploads/profile_photos/'.$this->avatar;
        }else {
            $path = "images/profile-picture.png";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }

    public function getCover($w = null, $h = null){
        if (!empty($this->cover_path)){
            $path = 'storage/uploads/covers/'.$this->cover_path;
        }else {
            return "";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }
    
    public function getSex(){
        if ($this->sex == 0) return "Male";
        return "Female";
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getAge(){
        if ($this->birthday) return date('Y') - $this->birthday->format('Y');
    }





}
