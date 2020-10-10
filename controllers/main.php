<?php
namespace controllers;

//use app\controllers\heritable\controller;
use controllers\heritable\controller;
use model\Post;
use model\Category;
use model\Tag;

class main extends controller {

        public function index($page=0)
            {
                $posts = Post::findAll();
                $categories = Category::findAll();
                $tags = Tag::findAll();
                view('views.main.index',compact(
                    'posts',
                              'categories',
                                    'tags'
                ));
            }
         public function singlePost($id){
            $post = $this->model->getPostByPostId($id);
            $post['all_comments'] = $this->model->getCommentsById($id);

            if(isset($_POST['comment'])){
                $this->model->addComment($id,$_POST);
            }
            if(isset($_POST['sub_comment'])){
                $this->model->addSubComment($_POST);
            }
             $this->view->render($post,'views/main/index.php');
         }

        public function footer(){

            echo json_encode($this->model->footer());
        }
        public function category($category){
            $params = $this->model->getAllPostsByCategoryName($category);
            $params['blogName']=$category;
            $this->view->render($params,'main/select');
        }
        public function tag($tag){
            $params = $this->model->getAllPostsByTagName($tag);
            $params['blogName']=$tag;
            $this->view->render($params,'main/select');
        }

}
