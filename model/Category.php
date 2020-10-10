<?php

namespace model;

use model\extend\Model;

class Category extends Model{

    public static $tableName = 'categories';
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
