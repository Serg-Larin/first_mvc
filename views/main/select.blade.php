@extends('main.layouts')
@section('content')

    <div class="container">
        <header class="header">
            <div class="header__inscription">Blogich</div>
        </header>
            <nav class="block_menu">
                <ul class="menu">
                    <li class="menu__item menu__item_active"><a href="/">Блог</a></li>
                    <li class="menu__item"><a href="">Тратата</a></li>
                    <li class="menu__item"><a href="">О Нас</a></li>
                    <li class="menu__item"><a href="">О Вас</a></li>
                    <li class="menu__item"><a href="">Контакты</a></li>
                </ul>
            </nav>
                <main class="main_content">
                    @isset($posts)
                    @foreach ($posts as $post)
                    <div class="post">
                        <label for="single_post_link">
                            <img class="post__image"  src="{{$post->getImage()}}" alt=""></label>
                        <div class="post__title" id="single_post_link">
                            <a href="/single/{{$post->id}}">{{$post->title}}</a>
                        </div>
                        <div class="post__description">
                        {{$post->content}}
                        </div>
                            <div class="post__author">
                                <span>Автор:</span>
                                <a href="">
                                    {{$post->user()->first()->login}}
                                </a>
                            </div>
                            <div class="post__component"><span>Категории:</span>
                                @if(!empty($post->categories()->get()))
                                @foreach ($post->categories()->get() as $category)
                                <a href="/category/{{$category->name}}" class="component_common_category">
                                    {{$category->name}}
                                </a>
                                @endforeach
                                @endif

                            </div>
                            <div class="post__component">
                                <span>Тэги:</span>

                                @if(!empty($post->tags()->get()))
                                @foreach ($post->tags()->get() as  $tag)
                                <a href="/tag/{{$tag->name}}" class="component_common_tag">
                                    {{$tag->name}}
                                </a>
                                @endforeach
                                @endif

                            </div>
                            <div class="post__date">
                                5th may of 2020.
                            </div>
                    </div>
                    @endforeach
                        @endisset
                </main>
    <aside class="right_sidebar">
                <div class="sections">
<!--                <div class="users">-->
<!--                    <div class="side_bar_block_name">-->
<!--                        Users:-->
<!--                    </div>-->
<!--                </div>-->
                <div class="categories">
                    <div class="side_bar_block_name">
                        Categories:
                    </div>
                    <div class="side_bar_block_body">
                        @foreach ( $categories as  $category)
                            <a href="/category/{{$category->name}}" class="component_common_category">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="tags">
                    <div class="side_bar_block_name">
                        Tags:
                    </div>
                    <div class="side_bar_block_body">
                       @foreach ($tags as $tag)

                            <a href="/tag/{{$tag->name}}" class="component_common_tag">{{$tag->name}}</a>

                        @endforeach
                    </div>
                </div>
            </div>
            </aside>
@endsection
