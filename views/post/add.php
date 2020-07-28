<?php require_once 'views/lib/layoutsForAdmin/header.php'; ?>
    <script>
        $(function(){
            $("select").bsMultiSelect();
        });
    </script>
        <h1><b>New post</b></h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                    <label for="categories">Categories</label>
                    <select id="categories" name="categories[]"  class="form-control"  multiple="multiple" >
                    <?php foreach ($arg['categories'] as $category):?>
                        <option value="<?=$category['id']?>"><?=$category['category']?></option>
                    <?php endforeach;?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="tags" >Tags</label>
                    <select id="tags"  name="tags[]" class="form-control"  multiple="multiple" >
                        <?php foreach ($arg['tags'] as $tag):?>
                            <option value="<?=$tag['id']?>"><?=$tag['tag']?></option>
                        <?php endforeach;?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Title</label>
                        <input type="text" name="title" class="form-control" id="formGroupExampleInput2" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Post image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">

                    </div>
                    <div class="col-6" style="background-color: #ff253a; height: 200px;"></div>
                </div>

            </div>
        </form>
<?php require_once 'views/lib/layoutsForAdmin/footer.php'; ?>