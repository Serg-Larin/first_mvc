<?php


namespace controllers;


use components\Exceptions\CustomValidationException;
use controllers\heritable\controller;
use Helpers\Helper;
use model\User;

class Auth extends controller
{
    public function login(){
        if(method('POST')){
            $post = $_POST;
            if($post['emailOrLogin'] === '' || $post['password'] === '' ){
                throw new CustomValidationException('Поля login и password должны быть заполнены',CustomValidationException::TYPE_ERROR);
            }
            /**
             * @var User $user
             */
            $user = User::where('login',$post['emailOrLogin'])->orWhere('email',$post['emailOrLogin'])->first();
            if(!$user){
                throw new CustomValidationException('Пользователь не существует либо вы неверно ввели логин',CustomValidationException::TYPE_ERROR);
            }
            $password = Helper::hash($post['password']);
            if($password !== $user->password){
                throw new CustomValidationException('Не верный пароль',CustomValidationException::TYPE_ERROR);
            }

            $_SESSION['user_id'] = $user->id;

            echo json_encode([
                'message' => 'Успешная авторизация',
                'code'    => CustomValidationException::TYPE_SUCCESS
            ]);
        } else {
            return view('user.authorization');
        }
    }

    public function logout(){
        if(isset($_SESSION['user_id'])){
            unset($_SESSION['user_id']);
        }
        Helper::redirect('/account/login');
    }

    public static function user(){
        if(isset($_SESSION['user_id'])){
            return User::find($_SESSION['user_id']);
        }
        print_r($_SESSION);
        return false;
    }

    public static function isAuth(){
        if(session()->has('user_id')) return true;
    }
}
