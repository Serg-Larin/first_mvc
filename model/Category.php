<?php

namespace model;

use model\extend\Model;

/**
 *
 * @property int    id
 * @property string name
 */

class Category extends Model{

    public static $tableName = 'categories';

    /**
     * @return Post|array
     */
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
