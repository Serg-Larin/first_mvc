<?php
namespace controllers;

use components\Exceptions\CustomValidationException;
use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Tag;
use Respect\Validation\Validator;


class TagController extends controller
{

    public function display(){
        $tags =  Tag::All();
        return view('admin.tag.display',compact('tags'));
    }

    public function edit($id){
        $tag = Tag::find($id);
        if(method('POST')) {
            if ($tag) {
                $validate = Validator::max(20)->stringType()->validate($_POST['tag']);
                if($validate) {
                    $tagName = $_POST['tag'];
                    $tag->name = $tagName;
                    $tag->save();
                }
                echo json_encode([
                    'message' => 'Тег отредактирован',
                    'code'    => CustomValidationException::TYPE_INFO
                ]);
            }
        }else {
            view('admin.tag.edit', compact('tag'));
        }
    }

    public function add(){
        if($_POST)
        {
            $tag = $_POST['tag'];
            $validate = Validator::max(20)->stringType()->validate($tag);
            if($validate){
                Tag::createNew($tag);
            }
            echo json_encode([
                'message' => 'Тег добавлен',
                'code'    => CustomValidationException::TYPE_SUCCESS
            ]);
        }
        else {
            return view('admin.tag.add');
        }
    }
    public function delete($id){
        $tag = Tag::find($id);
        if($tag){
            $tag->delete();
            Helper::redirect('/admin/tags');
        }
        Helper::redirect('/admin/tags');
    }

}
