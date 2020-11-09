<?php
namespace controllers;

use components\Exceptions\CustomValidationException;
use controllers\heritable\controller;
use model\Comment;
use model\Post;
use model\Category;
use model\Tag;

class MainController extends controller {

        public function index($page=0)
            {
                $query = Post::where('is_public',Post::TYPE_PUBLIC);
                $postsCount = $query->count();
                $limits = 10;
                //Что бы в url page чиналась с первой
                $page = $page === 0 ? $page : $page - 1;
                $posts = $query->limit($limits)->offset($page)->get();

                $categories = Category::all();
                $tags = Tag::all();
                return view('main.index',compact(
                    'posts',
                              'categories',
                                    'tags',
                                    'limits',
                    'postsCount',
                    'page'

                ));
            }
         public function singlePost($id){
            $post = Post::find($id);
            $categories = $post->categories()->get();
            $tags = $post->tags()->get();
            return view('main.singlePost',compact('post','categories','tags'));
         }

         public function addNewComment(){
            if(method('POST')){
                $post = $_POST;

                if($post['email']===''){
                    throw new CustomValidationException('Заполните поле email', CustomValidationException::TYPE_ERROR);
                }
                if($post['content']===''){
                    throw new CustomValidationException('Заполните поле content', CustomValidationException::TYPE_ERROR);
                }
                if(Comment::createNew($post)){
                    echo json_encode([
                        'message' => 'Ваш комментарий будет добавлен после проверки',
                        'code'    =>  CustomValidationException::TYPE_INFO
                    ]);
                } else {
                    throw new CustomValidationException('Ошибка при добавлении поста', CustomValidationException::TYPE_ERROR);
                }
            }
         }

        public function category($category){
            $category = Category::where('name',$category)->first();
            if($category){
                $posts = $category->posts()->get();
            }
            $categories = Category::All();
            $tags = Tag::All();
            return view('main.select',compact('posts','categories','tags'));
        }
        public function tag($tag){
            $category = Tag::where('name',$tag)->first();
            if($category){
                $posts = $category->posts()->get();
            }
            $categories = Category::All();
            $tags = Tag::All();
            return view('main.select',compact('posts','categories','tags'));
        }

}
