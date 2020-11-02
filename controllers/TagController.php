<?php
namespace controllers;

use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Tag;
use Respect\Validation\Validator;


class TagController extends controller implements resource
{

    public function display(){
        $tags =  Tag::findAll();
        return view('tag.display',compact('tags'));
    }

    public function edit($id){
        $tag = Tag::getById($id);
        if($_POST) {
            if ($tag) {
                $validate = Validator::max(20)->stringType()->validate($_POST['tag']);
                $tagName = $_POST['tag'];
                $tag->name = $tagName;
                $tag->save();
                Helper::redirect('/admin/tags');
            }
        }
        view('tag.edit', compact('tag'));

    }

    public function add(){
        if($_POST)
        {
            $tag = $_POST['tag'];
            $validate = Validator::max(20)->stringType()->validate($tag);
            if($validate){
                Tag::createNew($tag);
                Helper::redirect('/admin/tags');
            }
        }
        else {
            return view('tag.add');
        }
    }
    public function delete($id){
        $tag = Tag::getById($id);
        if($tag){
            $tag->delete();
            Helper::redirect('/admin/tags');
        }
        Helper::redirect('/admin/tags');
    }

}
