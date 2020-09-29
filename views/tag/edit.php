<?php require_once 'views/lib/layoutsForAdmin/header.php'; ?>

<h1><b>Edit tag</b></h1>
<hr>
<div class="col-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput2">tag</label>
            <input type="text" name="tag" class="form-control" id="formGroupExampleInput2" value="<?=$arg['tag'];?>">
            <input type="text" name="id" value="<?=$arg['id'];?>" hidden="hidden">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require_once 'views/lib/layoutsForAdmin/footer.php'; ?>
