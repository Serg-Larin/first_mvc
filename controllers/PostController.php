<?php
namespace controllers;

use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Category;
use model\Post;
use model\Tag;
use mysql_xdevapi\Exception;
use Respect\Validation\Validator;


class PostController extends controller implements resource{

    public function display($page=0){
        $posts = Post::findAll();
        return view('post.display',compact('posts'));
    }

    public function edit($id){
        $params = $this->model->selectRecordById($id);
        $tags = new \tagModel();
        $categories = new \categoryModel();
        $tagParams['tags'] = $tags->selectAllRecords();
        $categoryParams['categories'] = $categories->selectAllRecords();

        $params=array_merge($params,$tagParams,$categoryParams);
        if(!empty($_POST)){
            $this->model->update($_POST,$_FILES['image']);
            \Helper::redirect('/admin/posts');
        }
        $this->view->render($params);

    }
    public function add(){
        $tags = Tag::findAll();
        $categories = Category::findAll();
        if($_POST){
            $image = '';
            $post = $_POST;
            if($_FILES){
                if($_FILES['image']['type'] !== 'image/jpeg' || $_FILES['image']['type'] !== 'image/jpg'){
                    throw new Exception('Файл неподходящего типа. Рекомендуемые типы jpg, jpeg');
                }
            }
           Post::createNew($post);

        } else{

            return view('post.add',compact('tags','categories'));
        }
    }
    public function delete($id){
        $this->model->deleteRecord($id);
        \Helper::redirect('/admin/posts');
    }
}
