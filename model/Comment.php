<?php

namespace model;

use components\Exceptions\CustomValidationException;
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

    public static function createNew($post){
        $comment =new self();
        $comment->email = $post['email'];
        $comment->content = $post['content'];
        $comment->post_id = $post['id'];
        return $comment->save();
    }

}
