@extends('adminLayouts.layout')
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
                            @foreach($postCategories as $postCategory)
                            <option value="{{$category->getId()}}"
                            @if(isset($postCategory)&&$postCategory->getId()===$category->getId())
                                    selected
                                    @endif
                                >
                                {{$category->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags" >Tags</label>
                    <select id="tags"  name="tags[]" class="form-control"  multiple="multiple" >
                        @foreach($tags as $tag)
                            <option value="{{$tag->getId()}}"
                            @foreach($postTags as $postTag)
                                    @if(isset($postTag)&&$postTag->getId()===$tag->getId())
                                            selected
                                    @endif
                            @endforeach
                            >{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Title</label>
                    <input type="text" name="title" class="form-control" id="formGroupExampleInput2" value="{{$post->title}}" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$post->content}}</textarea>
                </div>
                <input type="text" value="{{$post->getId()}}" name="id" hidden>
                <button type="submit" id="postEdit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Post image</label>
                    <input type="file" name="image" class="form-control-file" id="image" >
                </div>
                <div class="form-check">
                    <input type="checkbox" name="is_public" class="form-check-input" @if($post->isPublic) checked @endif id="is_public">
                    <label class="form-check-label" for="is_public">Public</label>
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
            $.ajax({
                url: '/admin/posts/edit/{{$post->getId()}}',
                type: "POST",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function (res) {
                console.log(res);
                callMessage(res) ? button.removeAttr('disabled') : setTimeout(function (){
                    $(location).attr('href', '/admin/posts')
                },500);
            })
            e.preventDefault();
        })
        // })
    </script>
@endsection
