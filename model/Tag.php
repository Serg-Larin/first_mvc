<?php
namespace model;

use model\extend\Model;

/**
 * @property int    id
 * @property string name
 */

class Tag extends Model {

    public static $tableName = 'tags';

    public function posts(){
        return $this->belongsToMany(Post::class,'post_tag');
    }

}
