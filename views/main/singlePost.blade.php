@extends('main.layouts')
@section('content')
    <div class="single_post_container">
<!--        <header class="header"><span class="header__inscription">HEADER</span></header>-->
        <nav class="space_link_back">
            <a href="/"><i class="fas fa-angle-double-left fa-2x" style="color: lightskyblue"></i></a>
        </nav>
<div class="main_content_single_post" style="flex-wrap: wrap" >
    <div class="single_post_all_content">
    <div class="single_post_image" style="width: 100%;">
        <img src="{{$post->getImage()}}" alt="" width="600px" height="400px">
    </div>
    <div class="single_post_title" >
        <span>{{$post->title}}</span>
    </div>
    <div class="single_post_author">
        <span>author: </span>
        <span class="single_post_author_name">
            {{$post->user()->first()->login}}
        </span>
    </div>
    <div class="single_post_content">
        <span>
            {{$post->content}}
        </span>
    </div>
    <div class="single_post_component"><span>Категории:</span>

        @if(isset($categories) && !empty($categories))
        @foreach ($categories as $category)
        <a href="/category/{{$category->name}}" class="component_common_category">
            {{$category->name}}
        </a>
        @endforeach
        @endif


    </div>
    <div class="single_post_component">
        <span>Тэги:</span>

        @if(isset($tags) && !empty($tags))
            @foreach ($tags as $tag)
                <a href="/tag/{{$tag->name}}" class="component_common_tag">
                    {{$tag->name}}
                </a>
            @endforeach
        @endif

    </div>
    <div class="single_post_date">
        <span> 20th of November 2020</span>
    </div>
    <div class="comment_button_space">
        <div class="comment_button" id="comments_vision">
            Comments
        </div>
    </div>
    <div class="comment_space" >
        <div class="new_comment">
            <form action="" method="post" id="add_comment_form">
                <div class="comment_user_name_space">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <input type="text" class="form-control" name="id" value="{{$post->id}}" hidden>
                    </div>
                </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content" id="" cols="30" rows="6" placeholder="Your comment"></textarea>
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="add_comment_button">Добавить</button>
                </div>
            </form>
        </div>


        @if(!empty($post->comments()->get()))
        @foreach ($post->comments()->get() as $comment)
        <div class="comment" style="margin: 10px 10px; min-height: 150px;
             /*padding-left: 15px; border-left: 10px solid lightblue;*/
             -webkit-box-shadow: -8px 10px 20px 1px lightblue;
            -moz-box-shadow: -8px 10px 20px 1px lightblue;
            box-shadow: -8px 10px 20px 1px lightblue;
            /*display: flex;*/
            /*flex-direction: column;*/
            /*justify-content: space-between;*/
">
           <div style="padding: 15px">
            <div class="comment_img_space">
                <div class="comment_user_name">
                    {{$comment->email}}
                </div>
            </div>
            <div class="comment_content">
                <span>
                    {{$comment->content}}
                </span>
            </div>
            <div class="date">
                {{$comment->created_at}}
            </div>

           </div>

        </div>
              @endforeach
              @endif
    </div>
    </div>
    <script src="/js/singlePost.js"></script>
@endsection
