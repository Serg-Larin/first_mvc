<?php

require_once 'Model.php';

class categoryModel extends Model{

    public $fields = ['id','category'];

    public function deleteRecord($id)
    {
        $this->connect->query("DELETE FROM categories WHERE id = $id");
    }

    public function belongToPost($id){
        $fields =$this->getFields();
        return $this->connect->query("SELECT category_id FROM post_category WHERE post_id = '$id'")->fetchAll();
    }
    public function postCategory(){
        return $this->connect->query("SELECT post_category.post_id,categories.id, categories.category
        FROM post_category JOIN categories ON post_category.category_id = categories.id")->fetchAll();
    }


}