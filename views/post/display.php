<?php require_once 'views/lib/layoutsForAdmin/header.php'; ?>

    <h1><b>Posts</b></h1>

    <hr>

    <div style="text-align: center;"><a href="/admin/posts/add" style="text-decoration: none;"><i class="fas fa-plus-square fa-3x"  title="New Post"></i></a></div>
    <div style="text-align: center; ">
        <table class="col-12 table table-bordered" id="table">
            <thead>
            <tr style="max-height: 30px">
                <th style="width: 5px">#</th>
                <th style="width: 5px">Author</th>
                <th >title</th>
                <th >description</th>
                <th colspan="2" ></th>

            </tr>
            </thead>
            <tbody>
            <div class="admin_pagination">
                <?php foreach ($arg['pages'] as $page):?>
                    <div>
                        <a href="/admin/posts/<?=$page?>"><?=$page?></a>
                    </div>
                <?php endforeach;?>
            </div>
            <div >
                <?php foreach ($arg['posts'] as $posts): ?>
                <tr>
                <th><?=$posts['id']?></th>
                <td><?=$posts['login']?></td>
                <td><?=$posts['title']?></td>
                <td style="max-height: 10px"><div class="box" style="max-height: 40px; "><p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$posts['content']?>></p></div></td>

                <td><div ><a href="/admin/posts/edit/<?=$posts['id'];?>"><i class="fa fa-edit fa-2x edit" title="edit"></a></i></div></td>
                <td><div ><a href="/admin/posts/delete/<?=$posts['id'];?>"><i class="fas fa-trash fa-2x remove" title="remove"></a></i></div></td>
                </tr>
                <?php endforeach;?>

            </div>
            </tbody>
        </table>
        <div class="admin_pagination">
            <?php foreach ($arg['pages'] as $page):?>
                <div>
                    <a href="/admin/posts/<?=$page?>"><?=$page?></a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php require_once 'views/lib/layoutsForAdmin/footer.php'; ?>