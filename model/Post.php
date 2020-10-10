<?php

namespace model;

use model\extend\Model;
use model\User;

class Post extends Model
{
    public static $tableName = 'posts';
    public static function qwe(){
        print_r('asdzxc');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'author_id','');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
//
//    public function selectAllRecordsPagination($page=0)
//    {
//        if($page == 0) $page = 1;
//        $page = (($page-1)*COUNT_OF_NOTES);
//        $a = $this->connect->query("SELECT
//        p.id,u.login,p.title,p.title,p.content,p.image
//        FROM
//        posts AS p
//        LEFT JOIN
//        users AS u
//        ON
//        p.author_id = u.id LIMIT $page,".COUNT_OF_NOTES);
//        $result = $a->fetchAll();
//
//        return $result;
//    }
//    public function pagination(){
//        $pages = $this->connect->query("SELECT COUNT(*) FROM posts")->fetch()[0];
//
//        for($i=1 ; $i<=ceil($pages/COUNT_OF_NOTES);$i++){
//            $allPages[] = $i;
//        }
//        return $allPages;
//    }
//    public function selectRecordById($id)
//    {
//        $a = $this->connect->query("SELECT
//        p.id,u.login,p.title,p.title,p.content,p.image
//        FROM
//        posts AS p
//        LEFT JOIN
//        users AS u
//        ON
//        p.author_id = u.id
//        WHERE p.id = $id");
//        $result = $a->fetch();
//        return $result;
//    }
//    public function selectOneFieldById($field,$id)
//    {
//        return $this->connect->query("SELECT $field FROM posts WHERE id=$id")->fetch();
//    }
//
//    public function update(array $post,$file)
//    {
//        $this->connect->query("DELETE FROM post_category WHERE post_id = {$post['id']}");
//        $this->connect->query("DELETE FROM post_tag WHERE post_id = {$post['id']}");
//        if(isset($post['categories'])) {
//            for ($i = 0; $i < count($post['categories']); $i++) {
//                $this->connect->query("INSERT INTO post_category (post_id, category_id) VALUES ('{$post['id']}','{$post['categories'][$i]}')");
//            }
//        }
//        if(isset($post['tags'])) {
//            for ($i = 0; $i < count($post['tags']); $i++) {
//                $this->connect->query("INSERT INTO post_tag (post_id, tag_id) VALUES ('{$post['id']}','{$post['tags'][$i]}')");
//            }
//        }
//
//        $image = $this->connect->query("SELECT image FROM posts WHERE id={$post['id']}")->fetch();
//
//        $pathToImage = Helper::download($file,'post_images',$image[0]);
//        if($pathToImage =='') $pathToImage = $image[0];
//
//        $this->connect->query("UPDATE posts SET title = '{$post['title']}', content = '{$post['content']}', image = '$pathToImage' WHERE id = '{$post['id']}'");
//    }
//
//    public function insert($post,$file){
//        $path = Helper::download($file['image'],'post_images');
//        $userId = $_SESSION['user']['id'];
//        $date = date('l jS \of F Y');
//        $this->connect->query("INSERT INTO posts (author_id,title,content,image,date) VALUES ($userId,'{$post['title']}','{$post['content']}','$path','$date')");
//        $lastId = $this->connect->query("SELECT LAST_INSERT_ID()")->fetch()[0];
//
//            if(!empty($post['categories'])) {
//                for ($i = 0; $i < count($post['categories']); $i++) {
//                    $this->connect->query("INSERT INTO post_category (post_id, category_id) VALUES ('$lastId','{$post['categories'][$i]}')");
//                }
//            }
//        if(!empty($post['tags'])) {
//            for ($i = 0; $i < count($post['tags']); $i++) {
//                $this->connect->query("INSERT INTO post_tag (post_id, tag_id) VALUES ('$lastId','{$post['tags'][$i]}')");
//            }
//        }
//
//    }
//
//
//    public function addNewComment($id,$post){
//        $content = $post['content'];
//        $email = $post['email'];
//        $date = $date = date('l jS \of F Y');
//        $this->connect->query("INSERT INTO post_comment (post_id,content,email,date) VALUES ('$id','$content','$email','$date')");
//    }
//    public function addNewSubComment($post){
//        $id = $post['comment_id'];
//        $content = $post['content'];
//        $email = $post['email'];
//        $date = $date = date('l jS \of F Y');
//        echo "INSERT INTO comment_sub (comment_id,email,content,date) VALUES ('$id','$email','$content','$date')";
//        $this->connect->query("INSERT INTO comment_sub (comment_id,email,content,date) VALUES ('$id','$email','$content','$date')");
//    }
//
//
//
//    public function deleteRecord($id)
//    {
//        $this->connect->query("DELETE FROM posts WHERE id = $id");
//    }
//
//    public function postsByCategoryId($id){
//        return $this->connect->query("SELECT p.id,u.login, p.title, p.content, p.image FROM posts as p
//                                                LEFT JOIN users AS u ON p.author_id = u.id
//                                                JOIN post_category as pc ON p.id = pc.post_id
//                                                WHERE category_id = $id")->fetchAll();
//    }
//    public function postsByTagId($id){
//        return $this->connect->query("SELECT p.id,u.login, p.title, p.content, p.image FROM posts as p
//                                                LEFT JOIN users AS u ON p.author_id = u.id
//                                                JOIN post_tag as pt ON p.id = pt.post_id
//                                                WHERE tag_id = $id")->fetchAll();
//    }
//    public function postByPostId($id){
//        return $this->connect->query("SELECT p.id,u.login, p.title, p.content, p.image FROM posts as p
//                                                LEFT JOIN users AS u ON p.author_id = u.id WHERE p.id = $id")->fetch();
//    }
//
//    public function getComments($id){
//        return $this->connect->query("SELECT * FROM post_comment WHERE post_id = $id")->fetchAll();
//    }
//
//    public function getSubComments($id){
//        return $this->connect->query("SELECT * FROM comment_sub WHERE comment_id = $id")->fetchAll();
//    }
//
//
//




}
