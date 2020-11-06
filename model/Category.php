<?php

namespace model;

use components\Exceptions\CustomValidationException;
use model\extend\ModelMutator;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *
 * @property int    id
 * @property string name
 */

class Category extends ModelMutator{

    /**
     * @return BelongsToMany
     */
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public static function createNew($categoryName){
        $category = new Category();
        $category -> name = $categoryName;
        return $category -> save();
    }

}
