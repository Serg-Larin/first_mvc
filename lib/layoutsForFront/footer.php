<!--<pre>-->
<?php $items = json_decode(file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/main/footer'));?>
<!--</pre>-->
<div class="col-2 offset-1 bg-light">

    <div class="users">
        <div style="text-align: center"><h2>Users</h2></div>
        <?php foreach ($items->users as $user):?>
            <a href=""><div><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><span><?=$user->login?></span></div></a>
        <?php endforeach;?>
    </div>

    <div><h2 style="text-align: center;">Categories</h2></div>
    <div class="categories common bg-light" style="margin-top: 20px; ">
        <?php foreach ($items->categories as $category):?>
            <a href="/main/category/<?=$category->category?>"><span><?=$category->category?></span></a>
        <?php endforeach;?>
    </div>
    <div style="text-align: center;"><h2>Tags</h2></div>
    <div class="tags common" style="margin-top: 20px; ">
        <?php foreach ($items->tags as $tag):?>
            <a href="/main/tag/<?=$tag->tag?>"><span><?=$tag->tag?></span></a>
        <?php endforeach;?>

    </div>
</div>

</div>

</div>

<div class="navbar-fixed-bottom row-fluid bg-light">
    <div class="navbar-inner">
        <div class="container">
            qweqwe
        </div>
    </div>
</div>

</body>
</html>