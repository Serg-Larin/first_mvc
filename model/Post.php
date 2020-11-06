<?php

namespace model;

use components\DB;
use components\Exceptions\CustomValidationException;
use model\extend\ModelMutator;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 *
 * @property int       id
 * @property int       author_id
 * @property int       is_public
 * @property string    title
 * @property string    short_description
 * @property string    content
 * @property string    image
 * @property string    created_at
 * @property string    updated_at
 */

class Post extends ModelMutator
{
    public const TYPE_PUBLIC = 1;
    public const TYPE_NOT_PUBLIC = 0;

    protected $table = 'posts';
    protected $guarded = ['updated_at'];

    /**
     * @return BelongsToMany|array
     */
    public function categories(){
        return $this->belongsToMany(Category::class,'post_category');
    }
    /**
     * @return BelongsTo|array
     */
    public function user(){
        return $this->BelongsTo(User::class,'author_id','id');
    }
    /**
     * @return BelongsToMany|array
     */
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag');
    }
    /**
     * @return HasMany|array
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getImage(){
        return '/images/'.$this->image;
    }

    public static function createNew($postData,$image){
        /**
         * @var Post $post
         */

        $post = Post::updatePost($postData,$image);

        if(isset($postData['categories'])){
            foreach($postData['categories'] as $category){
                DB::builder()->table('post_category')->insert(['post_id'=>$post->id, 'category_id' =>$category]);
            }
        }

        if(isset($postData['tags'])){
            foreach($postData['tags'] as $tag){
                DB::builder()->table('post_tag')->insert(['post_id'=>$post->id, 'tag_id' =>$tag]);
            }
        }
        return true;
    }

    public function check_public(){
        return $this->is_public?
            '<i class="far fa-check-circle fa-2x" style="color: green"></i>':
            '<i class="far fa-times-circle fa-2x" style="color: red"></i>';
    }
    public function check_redact(){
        return $this->created_at!=$this->updated_at?'<i class="far fa-edit fa-2x" style="color: #ffa500"></i>':'';
    }

    protected static function updatePost($postData,$image){
        /**
         * @var $post Post
         */

        if(isset($postData['id'])){
            $post = Post::find($postData['id']);
        } else {
            $post = new self();
        }
        $post->author_id = 7;
        $post->is_public = isset($postData['is_public'])?self::TYPE_PUBLIC:self::TYPE_NOT_PUBLIC;
        $post->title = $postData['title'];
        $post->short_description = $postData['short_description'];
        $post->content = $postData['content'];
        if($image !== ''){
            if($post->image){
               unlink('public/images/'.$post->image);
            }
            $post->image = $image;
        }
        $isSave = $post->save();
        if(!$isSave){
            throw new CustomValidationException('Ошибка при сохраниении в базу данных', CustomValidationException::TYPE_ERROR);
        }
        return $post;
    }

    public static function updateOne($postData,$image){
        $post = Post::updatePost($postData,$image);

        if(isset($postData['categories'])){
            if($post->categories()->get()) {
                $res = DB::builder()->table('post_category')->where('post_id', $post->id)->delete();
            }
            foreach($postData['categories'] as $category){
                DB::builder()->table('post_category')->insert(['post_id'=>$post->id, 'category_id' =>$category]);
            }
        }

        if(isset($postData['tags'])){
            if($post->tags()->get()) {
                DB::builder()->table('post_tag')->where('post_id', $post->id)->delete();
            }
            foreach($postData['tags'] as $tag){
                DB::builder()->table('post_tag')->insert(['post_id'=>$post->id, 'tag_id' =>$tag]);
            }
        }
        return true;
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
