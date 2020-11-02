<?php
namespace controllers;

use controllers\heritable\controller;
use model\Post;
use model\Category;
use model\Tag;

class MainController extends controller {

        public function index($page=0)
            {
                $posts = Post::findAll();
                $categories = Category::findAll();
                $tags = Tag::findAll();
                return view('main.index',compact(
                    'posts',
                              'categories',
                                    'tags'
                ));
            }
         public function singlePost($id){
            $post = Post::getById($id);
            $categories = $post->categories();
            $tags = $post->tags();
            return view('main.singlePost',compact('post','categories','tags'));
         }

        public function category($category){
            $category = Category::getByColumn('name',$category);
            $categories = Category::findAll();
            $tags = Tag::findAll();
            if ($category){
                $posts = $category->posts();
            }
            return view('main.select',compact('posts','categories','tags'));
        }
        public function tag($tag){
            $tag = Tag::getByColumn('name',$tag);
            $categories = Category::findAll();
            $tags = Tag::findAll();
            if ($tag){
                $posts = $tag->posts();
            }
            return view('main.select',compact('posts','categories','tags'));
        }

}
