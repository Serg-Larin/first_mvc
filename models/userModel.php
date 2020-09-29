<?php

namespace model;

require_once 'Model.php';

class userModel extends Model {

    public $fields = ['id','login','email','image'];

    public function addUser($post,$file){
        $path = Helper::download($file['image'],'user_images');
        $password = md5($post['password']);
        $this->connect->query("INSERT INTO users (login,email,type,password,image)
        VALUES ('{$post['login']}','{$post['email']}','{$post['type']}','$password','$path') ");
    }

    public function checkUser($post){
        if(!isset($post['email'])||!isset($post['password'])) {
//            echo 'fill fields';
            return;
        }
        $user = $this->findUser($post['email']);
        if($user=='') {
//            echo 'User doesn\'t exist';
            return;
        }
        if(self::compareHash($post['password'],$user['password'])){
            $this->authorization($user);
            return true;
        }
    }
    public function update($post,$file){
        $previous = $this->connect->query("SELECT image FROM users WHERE id = {$post['id']}")->fetch()['image'];
        $path = Helper::Download($file['image'],'user_images',$previous);
        if($post['password']==$post['password_valid']&&!empty($post['password'])){
            $password = md5($post['password']);
            $this->connect->query("UPDATE users SET login = '{$post['login']}', email = '{$post['email']}', password =  '$password', image = '$path', type = '{$post['type']}'
        WHERE id = {$post['id']}");
        }
        else{
            $this->connect->query("UPDATE users SET login = '{$post['login']}', email = '{$post['email']}', image = '$path', type = '{$post['type']}'
        WHERE id = {$post['id']}");
        }

    }

    public function selectAllRecords()
    {
        return $this->connect->query("SELECT id, login, email,type FROM users")->fetchAll();
    }

    public function authorization($user){
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $user;
    }
    public  function logout(){
        unset($_SESSION['auth']);
        unset($_SESSION['user']);
    }

    static public function compareHash($formpass,$dbpass){
        return Helper::hash($formpass) === $dbpass;
    }
    public function findUser($email){
        $result = $this->connect->query("SELECT `id`,`login`,`email`,`type`,`password`,`image` FROM $this->tableName WHERE `email`='$email'");
        $result = ($result->fetch()) ?:'';
        return $result;
    }

    public function deleteRecord($id){
        echo "DELETE FROM users WHERE id = $id";
        $this->connect->query("DELETE FROM users WHERE id = $id");
    }


}
