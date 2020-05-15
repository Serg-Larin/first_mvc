<?php include_once 'lib/layoutsForFront/qweheader.php' ?>
<!--<pre>-->
<!--    --><?php //print_r($arg)?>
<!--</pre>-->
<!--    <pre>-->
<!--                --><?php //print_r($_SERVER)?>
<!--            </pre>-->

    <div class="container">
        <header class="header">
            <div class="header__inscription"><?php echo isset($arg['blogName']) ? $arg['blogName'] : 'Blogich';?></div>
        </header>
            <nav class="block_menu">
                <ul class="menu">
                    <li class="menu__item menu__item_active"><a href="/main">Блог</a></li>
                    <li class="menu__item"><a href="">Тратата</a></li>
                    <li class="menu__item"><a href="">О Нас</a></li>
                    <li class="menu__item"><a href="">О Вас</a></li>
                    <li class="menu__item"><a href="">Контакты</a></li>
                </ul>
            </nav>
                <main class="main_content">
                    <?php foreach ($arg['posts'] as $post):?>
                    <div class="post">
                        <img class="post__image"  src="<?=$post['image']?>" alt="">
                        <div class="post__title">
                            <a href="/main/single/<?=$post['id']?>"><?=$post['title']?></a>
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
                                    <a href="/main/category/<?=$category['category'];?>" class="component_common_category">
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
                                    <a href="/main/tag/<?=$tag['tag'];?>" class="component_common_tag">
                                        <?=$tag['tag'];?>
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
                            <a href="/main/category/<?=$category['category']?>" class="component_common_category"><?=$category['category']?></a>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="tags">
                    <div class="side_bar_block_name">
                        Tags:
                    </div>
                    <div class="side_bar_block_body">
                       <?php foreach ($arg['tags'] as $tag):?>

                            <a href="/main/tag/<?=$tag['tag']?>" class="component_common_tag"><?=$tag['tag']?></a>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            </aside>
        <div class="pagination">
                <i class="fas fa-angle-left" style="color:lightskyblue; margin-right: 10px; "></i>
            <?php foreach ($arg['pages'] as $page):?>
            <a href="<?=$page?>">
            <div class="pagination__block">
                    <?=$page?>
            </div>
            </a>
            <?php endforeach;?>

                <i class="fas fa-angle-right" style="color:lightskyblue; margin-left: 10px; "></i>
        </div>
<?php include_once 'lib/layoutsForFront/qwefooter.php' ?>