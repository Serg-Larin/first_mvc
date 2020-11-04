@extends('adminLayouts.layout')
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
                        <option value="{{$category->getId()}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="tags" >Tags</label>
                    <select id="tags"  name="tags[]" class="form-control"  multiple="multiple" >
                        @foreach ($tags as $tag)
                            <option value="{{$tag->getId()}}">{{$tag->name}}</option>
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
                    <button type="submit" class="btn btn-primary" id="postAdd">Submit</button>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Post image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
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
                    $.ajax({
                        url: '/admin/posts/add',
                        type: "POST",
                        data: form,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json'
                    }).done(function (res) {
                        setTimeout(function (){
                            callMessage(res) ? button.removeAttr('disabled') : setTimeout(function (){
                                $(location).attr('href', '/admin/posts')
                            },500);
                        },1000);

                    })
                e.preventDefault();
            })
            // $("#postAdd").on('click',function(){
            //
            //     let file = $('#exampleFormControlFile1').prop('files');
            //     console.log(JSON.stringify(file,true));
            //     console.log(file);
            //     $.ajax({
            //         url: '',
            //         data: {
            //             'file' : JSON.stringify(file)
            //         },
            //         processData: false,
            //         contentType: false,
            //         type: 'POST',
            //         success: function (data) {
            //             alert(data);
            //         }
            //     });
            //     return false;
            // });
        </script>
@endsection
