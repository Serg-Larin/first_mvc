<?php require_once 'views/lib/layoutsForAdmin/header.php'; ?>

    <h1><b>New user</b></h1>
    <hr>
<!--    <pre>--><?php //print_r($_SESSION);?><!--</pre>-->
    <div class="container">
        <div class="center-block">
            <form action="" method="post" enctype="multipart/form-data" style="text-align: center;">
                <div class="row" id="edit">
                    <div class="col-6">
                        <div class="col-6">
                            <div class="form-group">
                                <img src="<?=$arg['image']?>" alt="" width="200" height="300">
                                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Login</label>
                            <input type="text" value="<?=$arg['login']?>" class="form-control" name="login" id="formGroupExampleInput2" >
                            <input type="text" value="<?=$arg['id']?>" name="id" hidden>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" value="<?=$arg['email']?>" class="form-control" name="email" id="formGroupExampleInput2" >
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="text" class="form-control" name="password" id="formGroupExampleInput2" >
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Validation Password</label>
                            <input type="text" class="form-control" name="password_valid" id="formGroupExampleInput2" >
                        </div>
                        <div class="form-group">
                            <label for="custom-select">type</label>
                            <div class="col-6">
                                <select class="custom-select" name="type" >
                                    <option value="1">blogger</option>
                                    <option value="2">admin</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
<?php require_once 'views/lib/layoutsForAdmin/footer.php'; ?>