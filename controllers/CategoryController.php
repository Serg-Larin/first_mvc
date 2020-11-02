<?php
namespace controllers;

use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Category;
use Respect\Validation\Validator;

class CategoryController extends controller implements resource {

    public function display(){
       $categories =  Category::findAll();
       return view('category.display',compact('categories'));
    }

    public function edit($id){
        $category = Category::getById($id);
        if($_POST) {
            if ($category) {
                $validate = Validator::max(20)->stringType()->validate($_POST['category']);
                $categoryName = $_POST['category'];
                $category->name = $categoryName;
                $category->save();
                Helper::redirect('/admin/categories');
            }
        }
        view('category.edit', compact('category'));

    }

    public function add(){
        if($_POST)
        {
            $category = $_POST['category'];
            $validate = Validator::max(20)->stringType()->validate($category);
            if($validate){
                Category::createNew($category);
                Helper::redirect('/admin/categories');
            }
        }
        else {
            return view('category.add');
        }
    }
    public function delete($id){
        $category = Category::getById($id);
        if($category){
            $category->delete();
            Helper::redirect('/admin/categories');
        }
        Helper::redirect('/admin/categories');
    }
    public function getCategoryStatus($id){
        echo json_encode($this->model->belongToPost($id));
    }
}
