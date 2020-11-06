<?php
namespace controllers;



use controllers\heritable\controller;
use controllers\heritable\resource;
use model\User;

class UserController extends controller implements resource{

    const BLOGGER = 1;
    const ADMIN = 2;

    public $authorized;


    public function registration(){
        $this->authorized = 20;
        if(isset($_POST['Registration'])&&!empty($_POST['Registration'])){
            \Helper::out($this->model);
            $email = $_POST['email'];
            $login = $_POST['login'];
        }
        $qwe =['qwe'=>'qwe'];
        $this->view->render($qwe);
    }

    public function authorization(){
        if(isset($_POST)) {
            if ($this->model->checkUser($_POST))
            \Helper::redirect('/admin');
        }
        $this->view->render();
    }

    public function logout(){
        $this->model->logout();
        \Helper::redirect('/account/authorization');
    }

    public function defaultPage(){
        view('adminLayouts.layout');
    }

    public function display(){
        $users = User::all();
        view('user.display',compact('users'));
    }

    public function edit($id){
        $params = $this->model->selectRecordById($id);
        if(!empty($_POST)) {
            $this->model->update($_POST,$_FILES);
            \Helper::redirect('/admin/users');
        }
        $this->view->render($params);

    }

    public function add(){
        if(!empty($_POST)) {
            $this->model->addUser($_POST,$_FILES);
            \Helper::redirect('/admin/users');
        }
        $this->view->render();
    }

    public function delete($id){
        $this->model->deleteRecord($id);
        \Helper::redirect('/admin/users');
    }

}
