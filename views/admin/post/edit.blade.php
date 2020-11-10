@extends('admin.adminLayouts.layout')
@section('content')
    <script>
        $(function(){
            $("select").bsMultiSelect();
        });
    </script>
    <h1><b>Edit post</b></h1>
    <hr>
    <form enctype="multipart/form-data" id="edit_post_form" action="" method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select id="categories" name="categories[]"  class="form-control"  multiple="multiple" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @foreach($postCategories as $postCategory)
                                        @if(isset($postCategory)&&$postCategory->id===$category->id)
                                            selected
                                        @endif
                                    @endforeach
                                >
                                {{$category->name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags" >Tags</label>
                    <select id="tags"  name="tags[]" class="form-control"  multiple="multiple" >
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"
                            @foreach($postTags as $postTag)
                                    @if(isset($postTag)&&$postTag->id===$tag->id)
                                            selected
                                    @endif
                            @endforeach
                            >{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Title</label>
                    <input type="text" name="title" class="form-control" id="formGroupExampleInput2" value="{{$editedPost->title}}" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$editedPost->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <textarea name="short_description" class="form-control" id="short_description" rows="3" >{{$editedPost->short_description}}</textarea>
                </div>
                <input type="text" value="{{$editedPost->id}}" name="id" hidden>
                <button type="submit" id="postEdit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Post image</label>
                    <input type="file" name="image" class="form-control-file" id="image" >
                </div>
                <div class="form-check">
                    <input type="checkbox" name="is_public" class="form-check-input" @if($editedPost->is_public) checked @endif id="is_public">
                    <label class="form-check-label" for="is_public">Public</label>
                </div>
                <div class="form-check">
                    <div>
                        <img src="{{$editedPost->getImage()}}" alt="Картинка не добавлена" height="300" width="250">
                    </div>
                </div>
            </div>

            </div>
    </form>
    <script>
        // $(document).ready(function () {
        //     $('#tags').find('option').attr('selected','');
        $('#edit_post_form').submit(function (e) {
            let form = new FormData(this);
            let button = $('#postEdit');
            button.attr('disabled',true);

            ajaxRequest( '/admin/posts/edit/{{$editedPost->id}}',form).done(function (res) {
                console.log(res);
                callMessage(res) ?  setTimeout(function (){
                    $(location).attr('href', '/admin/posts')
                },500) : button.removeAttr('disabled');
            });
            e.preventDefault();
        })
        // })
    </script>
@endsection
