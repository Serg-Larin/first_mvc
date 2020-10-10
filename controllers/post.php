<?php
namespace controllers;

require_once 'heritable/controllerAdmin.php';

require_once 'heritable/resource.php';
require_once 'model/categoryModel.php';
require_once 'model/tagModel.php';

use controllerAdmin;
use heritable\resource;

class post extends controllerAdmin implements resource{

    public function display($page=0){
        $params['posts']=$this->model->selectAllRecordsPagination($page);
        $params['pages']=$this->model->pagination();
        $this->view->render($params);
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
    public function test(){
        $this->model->test();
    }

    public function add(){
        $tags = new \tagModel();
        $categories = new \categoryModel();
        $tagParams['tags'] = $tags->selectAllRecords();
        $categoryParams['categories'] = $categories->selectAllRecords();
        $params=array_merge($tagParams,$categoryParams);
        if(!empty($_POST)) {
            $this->model->insert($_POST,$_FILES);

            \Helper::redirect('/admin/posts');
        }
        $this->view->render($params);
    }
    public function delete($id){
        $this->model->deleteRecord($id);
        \Helper::redirect('/admin/posts');
    }
}
