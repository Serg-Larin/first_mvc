<?php
namespace controllers;



use components\Exceptions\CustomValidationException;
use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use Respect\Validation\Validator;
use model\User;

class UserController extends controller implements resource{


    public function defaultPage(){
        view('adminLayouts.layout');
    }

    public function display(){
        $users = User::all();
        $types = User::USER_TYPES_TEXT;
        view('user.display',compact('users','types'));
    }

    public function add()
    {

        if (method('POST')) {
            $post = $_POST;
            if ($post['password'] === '' && $post['second_password'] === '' && $post['login'] && $post['email']) {
                throw new CustomValidationException('Поля со звездочкой должны быть заполнены', CustomValidationException::TYPE_ERROR);
            }
            if ($post['password'] !== $post['second_password']) {
                throw new CustomValidationException('Поле Password и Same Password не совпадают.', CustomValidationException::TYPE_ERROR);
            }

            $image = '';
            if ($_FILES['image'] && $_FILES['image']['name'] != '') {
                if ($_FILES['image']['type'] !== 'image/jpeg' && $_FILES['image']['type'] !== 'image/jpg' && $_FILES['image']['type'] !== 'image/png') {
                    throw new CustomValidationException('Файл неподходящего типа. Рекомендуемые типы jpg, jpeg', CustomValidationException::TYPE_ERROR);
                } else {
                    //добавляем хэш к названию на случай если будут добавляться картинки и одинакоми названиями
                    $image = Helper::hash(rand(1, 100)) . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], User::UPLOADS . $image);
                }
            }

            if (User::createNew($post, $image)) {
                echo json_encode([
                    'message' => 'Пользователь добавлен',
                    'code' => CustomValidationException::TYPE_SUCCESS
                ]);
            }
        } else {
            return view('user.add');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (method('POST')) {
            $post = $_POST;

            if ($post['login']=== '' && $post['email']=== '') {
                throw new CustomValidationException('Поля со звездочкой должны быть заполнены', CustomValidationException::TYPE_ERROR);
            }
            if($post['password'] || $post['second_password']){
                if($post['password']==='' || $post['second_password']===''){
                    throw new CustomValidationException('Password и Same Password должны быить заполнены.', CustomValidationException::TYPE_ERROR);
                }
                if($post['password'] !== $post['second_password']){
                    throw new CustomValidationException('Поле Password и Same Password не совпадают.', CustomValidationException::TYPE_ERROR);
                }
            }
            $image = '';
            if ($_FILES['image']&&$_FILES['image']['name']!='') {
                if ($_FILES['image']['type'] !== 'image/jpeg' && $_FILES['image']['type'] !== 'image/jpg'&& $_FILES['image']['type'] !== 'image/png') {
                    throw new CustomValidationException('Файл неподходящего типа. Рекомендуемые типы jpg, jpeg', CustomValidationException::TYPE_ERROR);
                } else {
                    //добавляем хэш к названию на случай если будут добавляться картинки и одинакоми названиями
                    $image = Helper::hash(rand(1,100)).$_FILES['image']['name'];
                    move_uploaded_file ( $_FILES['image']['tmp_name'] , User::UPLOADS . $image );
                }
            }
            if(User::updateUser($post,$image)){
                echo json_encode([
                    'message' => 'Пользователь отредактирован',
                    'code'    => CustomValidationException::TYPE_INFO
                ]);
            }
        } else {
            return view('user.edit', compact('user'));
        }
    }


    public function delete($id){
        $user = User::find($id);
        if($user){
            if($user->image){
                $image = User::UPLOADS.$user->image;
                if(file_exists($image)){
                    unlink($image);
                }
            }
            $user->delete();
        }
        Helper::redirect('/admin/users');
    }

}
