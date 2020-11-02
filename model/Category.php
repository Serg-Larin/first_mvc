<?php

namespace model;

use model\extend\Model;

/**
 *
 * @property int    id
 * @property string name
 */

class Category extends Model{

    public static function tableName(){
        return 'categories';
    }

    /**
     * @return Post|array
     */
    public function posts(){
        return $this->belongsToMany(Post::class,'post_category');
    }

    public static function createNew($categoryName){
        $category = new Category();
        $category -> name = $categoryName;
        return $category -> save();
    }

}
