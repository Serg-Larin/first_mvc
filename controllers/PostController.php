<?php
namespace controllers;

use components\Exceptions\ValidationException;
use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Category;
use model\Post;
use model\Tag;
use Exception;
use Respect\Validation\Exceptions\ValidatorException;
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
            Helper::redirect('/admin/posts');
        }
        $this->view->render($params);

    }
    public function add(){
        $tags = Tag::findAll();
        $categories = Category::findAll();
        if(method('POST')){
            $image = '';
            $post = $_POST;
            print_r($_FILES);
            if($_FILES) {
                if ($_FILES['image']) {
                    if ($_FILES['image']['type'] !== 'image/jpeg' || $_FILES['image']['type'] !== 'image/jpg'|| $_FILES['image']['type'] !== 'image/png') {
                        throw new ValidationException('Файл неподходящего типа. Рекомендуемые типы jpg, jpeg', ValidationException::TYPE_ERROR);
                        return false;
                    } else {
                        throw new ValidationException('agasgfsefasefsef', ValidationException::TYPE_ERROR);
                        print_r(move_uploaded_file ( $_FILES['image']['tmp_name'] , 'public/'.$_FILES['image']['tmp_name'] ));
                    }
                } else {
                    throw new ValidationException('Принимаются только картинки', ValidationException::TYPE_ERROR);
                    return false;
                }
            }
            if($post['title'] === '' && $post['content'] === ''){
                throw new ValidationException('Поле title и content обязательны для заполнения', ValidationException::TYPE_ERROR);
                return false;
            }

        } else{
            return view('post.add',compact('tags','categories'));
        }
    }
    public function delete($id){
        $this->model->deleteRecord($id);
        Helper::redirect('/admin/posts');
    }
}
