<?php
namespace model;

include_once 'postModel.php';
include_once 'userModel.php';
include_once 'categoryModel.php';
include_once 'tagModel.php';

class mainModel {
    private $posts;
    private $users;
    private $categories;
    private $tags;

    public function __construct()
    {
//        $this->posts = new postModel();
//        $this->users = new userModel();
//        $this->categories = new categoryModel();
//        $this->tags = new tagModel();
    }

    public function index($page){
        $filling['posts'] = $this->posts->selectAllRecordsPagination($page);
        $filling['pages'] = $this->posts->pagination();
        $filling['tags'] = $this->tags->postTags();
        $filling['categories'] = $this->categories->postCategory();
        $filling['users'] = $this->users->selectAllRecords();
        $this->brute($filling['posts'],$filling['tags'],'tags');
        $this->brute($filling['posts'],$filling['categories'],'categories');
        return $filling;

    }

    public function footer(){
        $footer['users'] = $this->users->selectAllRecords();
        $footer['categories'] = $this->categories->selectAllRecords();
        $footer['tags'] = $this->tags->selectAllRecords();
        return $footer;
    }

    public function brute(&$array,$components,$key){
        foreach ($array as &$post){
            foreach ($components as $component){

                if($post['id'] == $component['post_id']){
                    $post[$key][]=$component;
                }
            }
        }
    }
    public function getAllPostsByCategoryName($name){
        $fillings['tags'] = $this->tags->postTags();
        $fillings['categories'] = $this->categories->postCategory();
        $fillings['posts'] = $this->posts->postsByCategoryId($this->categories->getIdByColumn($name,'category'));
        $this->brute($fillings['posts'],$fillings['tags'],'tags');
        $this->brute($fillings['posts'],$fillings['categories'],'categories');

        return  $fillings;
    }
    public function getAllPostsByTagName($name){
        $fillings['tags'] = $this->tags->postTags();
        $fillings['categories'] = $this->categories->postCategory();
        $fillings['posts'] = $this->posts->postsByTagId($this->tags->getIdByColumn($name,'tag'));
        $this->brute($fillings['posts'],$fillings['tags'],'tags');
        $this->brute($fillings['posts'],$fillings['categories'],'categories');

        return  $fillings;
    }
    public function getPostByPostId($id){
        $tags = $this->tags->postTags();
        $categories = $this->categories->postCategory();
        $post[] = $this->posts->postByPostId($id);
        $this->brute($post , $tags,'tags');
        $this->brute($post , $categories,'categories');

        return $post[0];
    }

    public function addComment($id,$post){
        $this->posts->addNewComment($id,$post);
    }

    public function addSubComment($post){
        $this->posts->addNewSubComment($post);
    }

    public function getCommentsById($id){
        $comments = $this->posts->getComments($id);
        if(!empty($comments)) {
            foreach ($comments as &$comment) {
                $comment['sub_comments'] = $this->posts->getSubComments($comment['id']);
            }
        }
        return $comments;
    }







}
