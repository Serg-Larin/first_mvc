<?php

namespace model;

use components\Exceptions\CustomValidationException;
use Helpers\Helper;
use model\extend\ModelMutator;

/**
 *
 * @property int    id
 * @property string login
 * @property string email
 * @property int    type
 * @property string password
 * @property string image
 */

class User extends ModelMutator {
    protected $table = 'users';

    public const UPLOADS = 'public/images/uploads/users/';
    public const IMAGE_PATH = '/images/uploads/users/';

    public const TYPE_BLOGGER = 1;
    public const TYPE_ADMIN = 2;

    public const USER_TYPES_TEXT = [
        self::TYPE_BLOGGER => 'блогер',
        self::TYPE_ADMIN   => 'админ'
    ];

    public function getImage(){
        return self::IMAGE_PATH.$this->image;
    }

    public static function createNew($post,$image){
        return self::userUpdate($post,$image);
    }

    public static function updateUser($post,$image){
       return self::userUpdate($post,$image);
    }

    protected static function userUpdate($post,$image){
        if(isset($post['id'])){
            $user = User::find($post['id']);
        } else {
            $user = new self();
        }
        $user->login = $post['login'];
        $user->email = $post['email'];
        $user->type = $post['type'];
        if($post['password'] !== ''){
            $user->password = Helper::hash($post['password']);
        }

        if($image !== ''){
            if($user->image){
                if(file_exists('public/images/uploads/users/'.$user->image)){
                    unlink('public/images/uploads/users/'.$user->image);
                }
            }
            $user->image = $image;
        }

        $isSave = $user->save();
        if(!$isSave){
            throw new CustomValidationException('Ошибка при записи в базу данных', CustomValidationException::TYPE_ERROR);
        }
        return $isSave;
    }

}
