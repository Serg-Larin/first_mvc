<?php
namespace controllers;

require_once 'heritable/resource.php';
require_once 'heritable/controllerAdmin.php';

use controllerAdmin;
use heritable\resource;


class TagController extends controllerAdmin implements resource {
    public function display(){
        $params=$this->model->selectAllRecords();
        $this->view->render($params);
    }

    public function edit($id){
        $params = $this->model->selectRecordById($id);
        if(!empty($_POST)) {
            $this->model->update($_POST,'tag');
            \Helper::redirect('/admin/tags');
        }
        $this->view->render($params);
    }

    public function add(){
        if(!empty($_POST)) {
            $this->model->insert($_POST,'tag');
            \Helper::redirect('/admin/tags');
        }
        $this->view->render();
    }
    public function delete($id){
        $this->model->deleteRecord($id);
        \Helper::redirect('/admin/tags');
    }

    public function getTagsStatus($id){
       echo json_encode($this->model->belongToPost($id));
    }

}
