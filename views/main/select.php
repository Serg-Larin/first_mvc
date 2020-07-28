<?php include_once 'views/lib/layoutsForFront/header.php' ?>
<!--<pre>-->
<!--    --><?php //print_r($arg)?>
<!--</pre>-->
    <div class="container">
        <header class="header">
            <div class="header__inscription"><?php echo isset($arg['blogName']) ? $arg['blogName'] : 'Blogich';?></div>
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
                    <?php foreach ($arg['posts'] as $post):?>
                    <div class="post">
                        <label for="single_post_link"><img class="post__image"  src="<?=$post['image']?>" alt=""></label>
                        <div class="post__title" id="single_post_link">
                            <a href="/single/<?=$post['id']?>"><?=$post['title']?></a>
                        </div>
                        <div class="post__description">
                        <?=$post['content']?>
                        </div>
                            <div class="post__author">
                                <span>Автор:</span>
                                <a href="">
                                    <?=$post['login']?>
                                </a>
                            </div>
                            <div class="post__component"><span>Категории:</span>
                                <?php if(isset($post['categories'])):
                                foreach ($post['categories'] as $category):?>
                                <a href="/category/<?=$category['category'];?>" class="component_common_category">
                                    <?=$category['category'];?>
                                </a>
                                <?php endforeach;
                                endif;
                                ?>
                            </div>
                            <div class="post__component">
                                <span>Тэги:</span>

                                <?php if(isset($post['tags'])):
                                foreach ($post['tags'] as  $tag):?>
                                <a href="/tag/<?=$tag['tag']?>" class="component_common_tag">
                                    <?=$tag['tag']?>
                                </a>
                                <?php endforeach;
                                endif;
                                ?>
                            </div>
                            <div class="post__date">
                                5th may of 2020.
                            </div>
                    </div>
                    <?php endforeach;?>
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
                        <?php foreach ( $arg['categories'] as  $category):?>
                            <a href="/category/<?=$category['category']?>" class="component_common_category"><?=$category['category']?></a>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="tags">
                    <div class="side_bar_block_name">
                        Tags:
                    </div>
                    <div class="side_bar_block_body">
                       <?php foreach ($arg['tags'] as $tag):?>

                            <a href="/tag/<?=$tag['tag']?>" class="component_common_tag"><?=$tag['tag']?></a>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            </aside>
<?php include_once 'views/lib/layoutsForFront/footer.php' ?>