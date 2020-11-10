@extends('admin.adminLayouts.layout')
@section('content')
        <h1><b>New post</b></h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data" id="add_post_form">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                    <label for="categories">Categories</label>
                    <select id="categories" name="categories[]"  class="form-control"  multiple="multiple" >
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="tags" >Tags</label>
                    <select id="tags"  name="tags[]" class="form-control"  multiple="multiple" >
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
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
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" class="form-control" id="short_description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="postAdd">Submit</button>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Post image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_public" class="form-check-input" id="is_public">
                        <label class="form-check-label" for="is_public">Public</label>
                    </div>
                </div>

            </div>
        </form>
        <script>
            $(function(){
                $("#tags").bsMultiSelect();
                $("#categories").bsMultiSelect();
            });
            $('#add_post_form').submit(function (e) {
                let form = new FormData(this);
                let button = $('#postAdd');
                button.attr('disabled',true);
                ajaxRequest('/admin/posts/add',form).done(function (res) {
                    console.log(res);
                    callMessage(res) ?  setTimeout(function (){
                        $(location).attr('href', '/admin/posts')
                    },500) : button.removeAttr('disabled');
                });
                e.preventDefault();
            })
        </script>
@endsection
