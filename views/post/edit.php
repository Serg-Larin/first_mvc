<?php require_once 'lib/layoutsForAdmin/header.php'; ?>
    <script>
        $(function(){
            $("select").bsMultiSelect();
        });
    </script>
    <h1><b>Edit post</b></h1>
    <hr>
    <form enctype="multipart/form-data" id="post_form" action="" method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select id="categories" name="categories[]"  class="form-control"  multiple="multiple" >
                        <?php foreach ($arg['categories'] as $category):?>
                            <option value="<?= $category['id'] ?>" ><?=$category['category']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags" >Tags</label>
                    <select id="tags"  name="tags[]" class="form-control"  multiple="multiple" >
                        <?php foreach ($arg['tags'] as $tag):?>
                            <option value="<?= $tag['id'] ?>"><?=$tag['tag']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Title</label>
                    <input type="text" name="title" class="form-control" id="formGroupExampleInput2" value="<?=$arg['title'];?>" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" ><?=$arg['content'];?></textarea>
                </div>
                <input type="text" value="<?=$arg['id']?>" name="id" hidden>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Post image</label>
                    <input type="file" name="image" class="form-control-file" id="image" >

                </div>
            </div>

            </div>
    </form>
    <script>
        // $(document).ready(function () {
        //     $('#tags').find('option').attr('selected','');
        $.ajax({

            type:'POST',
            url:'/admin/tag/ajax/<?=$arg['id']?>',
            data: 'qwe',
            success: function (data) {
                data = JSON.parse(data);
                let tagsOptions = $('#tags').find('option');
                for(let option in data){
                    tagsOptions.each(function () {
                        if($(this).val()==data[option]['tag_id']){

                            // $(this).attr('selected','selected');
                            this.setAttribute('selected', 'selected');
                            console.log(this);
                        }
                    })
                }
            }
        });
        $.ajax({
            type:'POST',
            url:'/admin/category/ajax/<?=$arg['id']?>',
            data: 'qwe',
            success: function (data) {
                data = JSON.parse(data);
                let categoriesOptions = $('#categories').find('option');
                for(let option in data){
                    categoriesOptions.each(function () {
                        if($(this).val()==data[option]['category_id']){
                            // console.log(this);
                            console.log($(this).attr('selected',''));
                        }
                    })
                }
            }
        });
        // })
    </script>


<?php require_once 'lib/layoutsForAdmin/footer.php'; ?>