<?php


namespace controllers;


use components\Exceptions\CustomValidationException;
use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Comment;
use model\User;

class CommentController extends controller
{
    public function display(){
        $comments = Comment::all();
//        dump($comments);
        return view('admin.comment.display', compact('comments'));
    }


    public function add()
    {

//        view()
    }
    public function edit($id=0)
    {
//        if(method('POST')) {
//            $post = $_POST;
//            if(isset($post['edit'])){
//                throw new CustomValidationException(json_encode($post),CustomValidationException::TYPE_INFO);
//            }
//            } else {
//            return view('admin.comment.edit', compact('comments'));
//            }
//
////            if(isset($post['edit'])){
////                throw new CustomValidationException(json_encode($post),CustomValidationException::TYPE_INFO);
////            }elseif ($id != 0) {
////                //Одна запись
////                $comments = Comment::find($id);
//////                dd($comments);
////                return view('admin.comment.edit', compact('comments'));
////
////            } else {
////                //Несколько записей
////                $comments = Comment::whereIn('id',$post)->get();
//////                dd($comments);
////                if(isset($post['edit'])&&$post['edit']=='true'){
////                    throw new CustomValidationException(json_encode($post),CustomValidationException::TYPE_INFO);
////                }
////                return view('admin.comment.edit', compact('comments'));
////            }
////        }


    }
    public function delete($id)
    {

    }


}
