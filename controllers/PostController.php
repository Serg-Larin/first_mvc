<?php
namespace controllers;

use components\Exceptions\CustomValidationException;
use controllers\heritable\controller;
use controllers\heritable\resource;
use Helpers\Helper;
use model\Category;
use model\Post;
use model\Tag;



class PostController extends controller implements resource{

    public function display($page=0){
        $posts = Post::all();
        return view('post.display',compact('posts'));
    }

    public function add(){
        $tags = Tag::All();
        $categories = Category::All();
        if(method('POST')){
            $image = '';
            $post = $_POST;
            if($post['title'] === '' && $post['content'] === ''){
                throw new CustomValidationException('Поле title и content обязательны для заполнения', CustomValidationException::TYPE_ERROR);
            }
            if(isset($_FILES['image'])&&$_FILES['image']['name'] !== '') {
                if ($_FILES['image']) {
//                    throw new ValidationException(json_encode($_FILES['image']), ValidationException::TYPE_ERROR);
                    if ($_FILES['image']['type'] !== 'image/jpeg' && $_FILES['image']['type'] !== 'image/jpg'&& $_FILES['image']['type'] !== 'image/png') {
                        throw new CustomValidationException('Файл неподходящего типа. Рекомендуемые типы jpg, jpeg', CustomValidationException::TYPE_ERROR);
                    } else {
                        //добавляем хэш к названию на случай если будут добавляться картинки и одинакоми названиями
                        $image = Helper::hash(rand(1,100)).$_FILES['image']['name'];
                        move_uploaded_file ( $_FILES['image']['tmp_name'] , Post::UPLOADS . $image );
                    }
                } else {
                    throw new CustomValidationException('Принимаются только картинки', CustomValidationException::TYPE_ERROR);
                }
            }
            //Для отображения на главной странице необходима картинка
            elseif(isset($post['is_public'])){
                if($image===''){
                    throw new CustomValidationException('Для открытой публикации необходимо добавить картинку', CustomValidationException::TYPE_ERROR);
                }
            }

            if(Post::createNew($post,$image)){
                die(json_encode(
                   [
                        'message'   =>  'Запись добавлена',
                        'code'      =>  CustomValidationException::TYPE_SUCCESS
                   ]
                ));
//                return true;
            }
        } else{
            return view('post.add',compact('tags','categories'));
        }
    }

    public function edit($id){
        /**
         * @var Post $editedPost
         */
        $editedPost = Post::find($id);
        if(method('POST')){
            $image = '';
            $post = $_POST;
            if($post['title'] === '' && $post['content'] === ''){
                throw new CustomValidationException('Поле title и content обязательны для заполнения', CustomValidationException::TYPE_ERROR);
            }
            if(isset($_FILES['image'])&&$_FILES['image']['name'] !== '') {
                if ($_FILES['image']) {
//                    throw new ValidationException(json_encode($_FILES['image']), ValidationException::TYPE_ERROR);
                    if ($_FILES['image']['type'] !== 'image/jpeg' && $_FILES['image']['type'] !== 'image/jpg'&& $_FILES['image']['type'] !== 'image/png') {
                        throw new CustomValidationException('Файл неподходящего типа. Рекомендуемые типы jpg, jpeg', CustomValidationException::TYPE_ERROR);
                    } else {
                        //добавляем хэш к названию на случай если будут добавляться картинки и одинакоми названиями
                        $image = Helper::hash(rand(1,100)).$_FILES['image']['name'];
                        move_uploaded_file ( $_FILES['image']['tmp_name'] , Post::UPLOADS . $image );
                    }
                } else {
                    throw new CustomValidationException('Принимаются только картинки', CustomValidationException::TYPE_ERROR);
                }
            }
            //Для отображения на главной странице необходима картинка
            elseif(isset($post['is_public'])&&$editedPost->image=='') {
                if ($image === '') {
                    throw new CustomValidationException('Для открытой публикации необходимо добавить картинку', CustomValidationException::TYPE_ERROR);
                }
            }
            if(Post::updateOne($post,$image)){
                die(json_encode(
                    [
                        'message'   =>  'Запись отредактирована',
                        'code'      =>  CustomValidationException::TYPE_INFO
                    ]
                ));
//                return true;
            }
        } else {

            $postCategories = $editedPost->categories()->get();
            $postTags = $editedPost->tags()->get();
            $tags = Tag::All();
            $categories = Category::All();


            return view('post.edit', compact(
                'editedPost',
                'postCategories',
                'postTags',
                'tags',
                'categories'));
        }
        }

    public function delete($id){
       $post = Post::find($id);
       $post->delete();
        if($post && $post->image){
            $image = Post::UPLOADS.$post->image;
            if(file_exists($image)){
                unlink($image);
            }
        }
        Helper::redirect('/admin/posts');
    }
}
