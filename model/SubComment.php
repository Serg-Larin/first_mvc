<?php

namespace model;

use model\extend\Model;

/**
 *
 * @property int    comment_id
 * @property string email
 * @property string content
 * @property string date
 */


class SubComment extends Model
{
    public static $tableName = 'comment_sub';



}
