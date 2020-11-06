<?php

namespace model;

use model\extend\ModelMutator;

/**
 *
 * @property int    id
 * @property int    post_id
 * @property string content
 * @property string email
 * @property string date
 */

class Comment extends ModelMutator
{
    protected $table = 'post_comment';

    public function sub_comments(){
        return $this->belongsToMany(SubComment::class);
    }


}
