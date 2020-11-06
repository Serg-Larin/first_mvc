<?php
namespace controllers;

use components\Exceptions\CustomValidationException;
use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Category;
use Respect\Validation\Validator;

class CategoryController extends controller implements resource {

    public function display(){
       $categories =  Category::All();
       return view('category.display',compact('categories'));
    }

    public function edit($id){
        $category = Category::find($id);

        if(method('POST')) {
            if ($category) {
                $validate = Validator::max(20)->stringType()->validate($_POST['category']);
                if($validate) {
                    $categoryName = $_POST['category'];
                    $category->name = $categoryName;
                    $category->save();
                }
                echo json_encode([
                    'message' => 'Категория отредактирована',
                    'code'    => CustomValidationException::TYPE_INFO
                ]);
            }
        } else {
            view('category.edit', compact('category'));
        }
    }

    public function add(){
        if($_POST)
        {
            $category = $_POST['category'];
            $validate = Validator::max(20)->stringType()->validate($category);
            if($validate){
                Category::createNew($category);
            }
            echo json_encode([
                'message' => 'Категория добавлена',
                'code'    => CustomValidationException::TYPE_SUCCESS
            ]);
        }
        else {
            return view('category.add');
        }
    }
    public function delete($id){
        Category::where('id',$id)->delete();
        Helper::redirect('/admin/categories');
    }

}
