<?php
namespace model;

use model\extend\ModelMutator;

/**
 * @property int    id
 * @property string name
 */

class Tag extends ModelMutator {

    public static function tableName(){
        return 'tags';
    }
    public function posts(){
        return $this->belongsToMany(Post::class,'post_tag');
    }

    public static function createNew($tagName){
        $tag = new self;
        $tag->name = $tagName;
        return $tag->save();
    }

}
