<?php
namespace controllers;

//use app\controllers\heritable\controller;
use controllers\heritable\controller;
use model\Post;
use model\Category;
use model\Tag;

class MainController extends controller {

        public function index($page=0)
            {
                $posts = Post::findAll();
                $categories = Category::findAll();
                $tags = Tag::findAll();
                return view('main.index',compact(
                    'posts',
                              'categories',
                                    'tags'
                ));
            }
         public function singlePost($id){
            $post = Post::getById($id);
            $categories = $post->categories();
            $tags = $post->tags();
            return view('main.singlePost',compact('post'));
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
