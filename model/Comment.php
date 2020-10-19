<?php

namespace model;

use model\extend\Model;


class Comment extends Model
{
    public static $tableName = 'post_comment';

    public function sub_comment(){
        return $this->belongsToMany(SubComment::class,'post_comment','comment_id','id');
    }


}
