<?php require_once 'views/lib/layoutsForAdmin/header.php'; ?>
    <h1><b>Categories</b></h1>

    <hr>
    <div ><a href="/admin/category/add" style="text-decoration: none;"><i class="fas fa-plus-square fa-3x"  title="New Post"></i></a></div>
    <div style="text-align: center; "><table class="col-6 table table-bordered" id="table">
            <thead>
            <tr style="max-height: 30px">
                <th style="width: 5px">#</th>
                <th style="width: 5px">Category</th>

                <th colspan="2" ></th>

            </tr>
            </thead>
            <tbody>
            <div >
                <?php foreach ($arg as $category) : ?>
                <tr>
                    <th><?=$category['id'];?></th>
                    <td><?=$category['category'];?></td>
                    <td><div ><a href="/admin/category/edit/<?=$category['id'];?>"><i class="fa fa-edit fa-2x edit" title="edit"></a></i></div></td>
                    <td><div ><a href="/admin/category/delete/<?=$category['id'];?>"><i class="fas fa-trash fa-2x remove" title="remove"></i></div></td>
                </tr>
                <?php endforeach; ?>
            </div>
            </tbody>
        </table></div>

<?php require_once 'views/lib/layoutsForAdmin/footer.php'; ?>

