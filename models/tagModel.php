<?php

require_once 'Model.php';

class tagModel extends Model {

    public $fields = ['id','tag'];

    public function belongToPost($id){
        $fields =$this->getFields();
        return $this->connect->query("SELECT tag_id FROM post_tag WHERE post_id = '$id'")->fetchAll();
    }

    public function deleteRecord($id)
    {
        $this->connect->query("DELETE FROM tags WHERE id = $id");
    }

    public function postTags(){
       return $this->connect->query("SELECT post_tag.post_id,tags.id, tags.tag FROM post_tag JOIN tags ON post_tag.tag_id = tags.id")->fetchAll();
    }
}