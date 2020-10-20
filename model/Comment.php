<?php

namespace model;

use model\extend\Model;

/**
 *
 * @property int    id
 * @property int    post_id
 * @property string content
 * @property string email
 * @property string date
 */

class Comment extends Model
{
    public static $tableName = 'post_comment';

    public function sub_comment(){
        return $this->belongsToMany(SubComment::class,'post_comment','comment_id','id');
    }


}
