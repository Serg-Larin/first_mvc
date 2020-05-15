<?php require_once 'lib/layoutsForAdmin/header.php'; ?>
<h1><b>Edit category</b></h1>
<hr>


<div class="col-4">
<form action="" method="post">
<div class="form-group">
    <label for="formGroupExampleInput2">category</label>
    <input type="text" class="form-control" name="category" value="<?=$arg['category'];?>" id="formGroupExampleInput2" >
    <input type="text" name="id" value="<?=$arg['id'];?>" hidden="hidden">
</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

<?php require_once 'lib/layoutsForAdmin/footer.php'; ?>
