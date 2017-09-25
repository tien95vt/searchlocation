<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category()
    {
    	return $this->belongsTo('App\category', 'category_id', 'id');
    }

    public function postPicture()
    {
    	return $this->hasMany('App\postPicture', 'id', 'post_id');
    }
}
