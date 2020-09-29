<?php
namespace controllers;

require_once 'heritable/controller.php';

use app\controllers\controller;

class main extends controller {

        public function index($page=0)
            {
            echo 'kok';

                $this->view->render($this->model->index($page));
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
