<?php include_once 'views/lib/layoutsForFront/header.php' ?>
<!--<pre>-->
<?//////=$_SERVER['HTTP_REFERER']?>
    <?php print_r($post) ?>
<!--</pre>-->

    <div class="single_post_container">
<!--        <header class="header"><span class="header__inscription">HEADER</span></header>-->
        <nav class="space_link_back">
            <a href="/"><i class="fas fa-angle-double-left fa-2x" style="color: lightskyblue"></i></a>
        </nav>
<div class="main_content_single_post" style="flex-wrap: wrap" >
    <div class="single_post_all_content">
    <div class="single_post_image" style="width: 100%;">
        <img src="<?=$post->image?>" alt="" width="600px" height="400px">
    </div>
    <div class="single_post_title" >
        <span><?=$post->title?></span>
    </div>
    <div class="single_post_author">
        <span>author: </span>
        <span class="single_post_author_name">
            <?=$post->user()->login?>
        </span>
    </div>
    <div class="single_post_content">
        <span>
            <?=$post->content?>
        </span>
    </div>
    <div class="single_post_component"><span>Категории:</span>
        <?php
        if(isset($categories) && !empty($categories)):
        foreach ($categories as $category): ?>
        <a href="/category/<?=$category->name?>" class="component_common_category">
            <?=$category->name?>
        </a>
        <?php endforeach;
        endif;
        ?>

    </div>
    <div class="single_post_component">
        <span>Тэги:</span>
        <?php
        if(isset($tags) && !empty($tags)):
            foreach ($tags as $tag): ?>
                <a href="/tag/<?=$tag->name?>" class="component_common_tag">
                    <?=$tag->name?>
                </a>
            <?php endforeach;
        endif;
        ?>
    </div>
    <div class="single_post_date">
        <span> 20th of November 2020</span>
    </div>
    <div class="comment_button_space">
        <div class="comment_button">
            Comments
        </div>
    </div>
    <div class="comment_space">
        <div class="new_comment">
            <form action="" method="post">
                <div class="comment_user_name_space">
                    <input type="text" name="email" placeholder="email">
                </div>
                    <div>
                        <textarea name="content" id="" cols="30" rows="10" placeholder="Your comment"></textarea>
                    </div>
                <div class="comment_submit_space">
                    <input type="submit" name="comment" value="comment">
                </div>
            </form>
        </div>
        <?php foreach ($arg['all_comments'] as $comment): ?>
        <div class="comment" style="display:none;">
            <div class="comment_img_space">
                <div>
                    <img src="/uploads/user_images/187e1529063.jpg" id="img" alt="" class="comment_user_img">
                </div>
                <div class="comment_user_name">
                    <?=$comment['email']?>
                </div>
            </div>
            <div class="comment_content">
                <span><?=$comment['content']?></span>
            </div>
            <div class="date"><?=$comment['date']?></div>
            <div class="open_sub_comment">
                <span class="open_sub_comment_button" ><i id="drop_down" class="fas fa-chevron-down fa-2x"></i></span>
            </div>
            <div class="new_sub_comment" >
                <form action="" method="post">
                    <div class="sub_comment_user_name_space">
                        <input type="text" name="email" placeholder="email">
                        <input type="text" value="5" name="comment_id" hidden>
                    </div>
                    <div class="sub_comment_content">
                        <textarea name="content" id="" cols="30" rows="10" placeholder="Your comment"></textarea>
                    </div>
                    <div class="sub_comment_submit_space">
                        <input type="submit" name="sub_comment" value="comment">
                    </div>
                </form>
            </div>
           <?php foreach ($comment['sub_comments'] as $subcomment):?>
            <div class="sub_comment">
                <div class="sub_comment_img_space">
                    <div>
                        <img src="/uploads/user_images/187e1529063.jpg" id="img" alt="" class="sub_comment_user_img">
                    </div>
                    <div class="comment_user_name">
                        <?php print_r($subcomment['email'])?>
                    </div>
                </div>
                <div class="comment_content">
                    <span><?=$subcomment['content']?></span>
                </div>
                <div class="date"><?=$subcomment['date']?></div>
            </div>
            <?php endforeach;?>
        </div>
        <?php endforeach;?>

    </div>
    </div>
    <script src="/js/singlePost.js"></script>
<?php include_once 'views/lib/layoutsForFront/footer.php' ?>
