<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable = [
        'post_id','tag_id'
    ];

    public function Tag(){
        return $this->belongsTo('App\Tags');
    }
}
