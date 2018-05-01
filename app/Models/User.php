<?php

namespace App\Models;

use App\Library\sHelper;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\URL;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'birthday'
    ];

    public function follower(){
        return $this->hasMany('App\Models\UserFollowing', 'following_user_id', 'id');
    }

    public function following(){
        return $this->hasMany('App\Models\UserFollowing', 'follower_user_id', 'id');
    }



    public function posts(){
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }

    public function has($Model){
        if (count($this->$Model) > 0) return true;
        return false;
    }

   public function getPhoto($w = null, $h = null){
        if (empty($this->profile_path)){
            $path = 'storage/profile_photos/'.$this->profile_pic;
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
            $path = 'storage/covers/'.$this->cover_path;
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


    public function suggestedPeople($limit = 5, $city_id = null, $hobby_id = null, $all = null){
        $list = User::where('id', '!=', $this->id);

        if ($all == null) {
            $list = $list->whereNotIn('id', function ($q) {
                $q->select('following_user_id')->from('user_following')->where('follower_user_id', $this->id);
            });
        }

        if ($city_id != null && $hobby_id != null){
            $list = $list->whereExists(function ($query) use($city_id) {
                $query->select(DB::raw(1))
                    ->from('user_locations')
                    ->whereRaw('users.id = user_locations.user_id and user_locations.city_id = '.$city_id);
            })->whereExists(function ($query) use($hobby_id) {
                $query->select(DB::raw(1))
                    ->from('user_hobbies')
                    ->whereRaw('users.id = user_hobbies.user_id and user_hobbies.hobby_id = '.$hobby_id);
            });
        }

        $list = $list->limit($limit)->inRandomOrder()->get();
        return $list;
    }

  

    public function messagePeopleList(){
        $list = $this->follower()->where('allow',1)->with('follower')->whereExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('user_following as f')
                ->whereRaw('f.following_user_id = user_following.follower_user_id')
                ->whereRaw('f.follower_user_id = '.$this->id)
                ->whereRaw('f.allow = 1');
        });

        return $list;
    }

 
}