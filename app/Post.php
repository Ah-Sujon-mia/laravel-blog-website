<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','slug','image','description','category_id','user_id','publish_at'
    ];

    public function Category(){
        return $this->belongsTo('App\Category');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }


}
