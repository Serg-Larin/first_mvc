<?php
namespace controllers;

require_once 'heritable/resource.php';
require_once 'heritable/controllerAdmin.php';

use controllerAdmin;
use heritable\resource;


class CategoryController extends controllerAdmin implements resource {

    public function display(){
        $params=$this->model->selectAllRecords();
        $this->view->render($params);
    }

    public function edit($id){
        $params = $this->model->selectRecordById($id);
        if(!empty($_POST)) {
            $this->model->update($_POST,'category');
            \Helper::redirect('/admin/categories');
        }
        $this->view->render($params);

    }

    public function add(){
        if(!empty($_POST)) {
            $this->model->insert($_POST,'category');
            \Helper::redirect('/admin/categories');
        }
        $this->view->render();
    }
    public function delete($id){
        $this->model->deleteRecord($id);
        \Helper::redirect($this->url);
    }
    public function getCategoryStatus($id){
        echo json_encode($this->model->belongToPost($id));
    }
}
