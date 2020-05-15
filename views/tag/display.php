<?php require_once 'lib/layoutsForAdmin/header.php'; ?>

    <h1><b>Tags</b></h1>

    <hr>

    <div ><a href="/admin/tag/add" style="text-decoration: none;"><i class="fas fa-plus-square fa-3x"  title="New Post"></i></a></div>
    <div style="text-align: center; "><table class="col-6 table table-bordered" id="table">
            <thead>
            <tr style="max-height: 30px">
                <th style="width: 5px">#</th>
                <th style="width: 5px">Tag</th>

                <th colspan="2" ></th>

            </tr>
            </thead>
            <tbody>
            <div >
                <?php foreach ($arg as $tag) : ?>
                <tr>
                    <th><?=$tag['id'];?></th>
                    <td><?=$tag['tag']?></td>
                    <td><div ><a href="/admin/tag/edit/<?=$tag['id'];?>"><i class="fa fa-edit fa-2x edit" title="edit"></a></i></div></td>
                    <td><div ><a href="/admin/tag/delete/<?=$tag['id'];?>"><i class="fas fa-trash fa-2x remove" title="remove"></i></a></div></td>
                </tr>
                <?php endforeach; ?>
            </div>
            </tbody>
        </table></div>

<?php require_once 'lib/layoutsForAdmin/footer.php'; ?>