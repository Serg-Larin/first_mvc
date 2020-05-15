<?php require_once 'lib/layoutsForAdmin/header.php'; ?>

    <h1><b>New user</b></h1>
    <hr>
<div class="container">
    <div class="center-block">
    <form action="" method="post" enctype="multipart/form-data" style="text-align: center;">
        <div class="row">
            <div class="col-6">
                <div class="col-6">

                    <div class="form-group">
                        <div class="col-6" style="background-color: #ff253a; height: 200px;"></div>


                    </div>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">Login</label>
                    <input type="text" name="login" class="form-control" id="formGroupExampleInput2" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" name="email" class="form-control" id="formGroupExampleInput2" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Password</label>
                    <input type="text" name="password" class="form-control" id="formGroupExampleInput2" >
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
<!--                <button type="submit" class="btn btn-primary">Submit</button>-->
                <input type="submit" name="submit" class="btn btn-primary">Submit</input>
            </div>


        </div>
    </form>
</div>
</div>
<?php require_once 'lib/layoutsForAdmin/footer.php'; ?>