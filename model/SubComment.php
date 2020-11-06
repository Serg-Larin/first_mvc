<?php

namespace model;

use model\extend\ModelMutator;

/**
 *
 * @property int    comment_id
 * @property string email
 * @property string content
 * @property string date
 */


class SubComment extends ModelMutator
{
    public static function tableName(){
        return 'comment_sub';
    }


}
