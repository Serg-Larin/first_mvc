@extends('admin.adminLayouts.layout')
@section('content')
{{--    @dump($comments)--}}
    <h1><b>Edit comment</b></h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data" id="edit_comments_form">
        <div style="text-align: center; display: flex; align-items: center;flex-direction: column;">

            @foreach($comments as $comment)

            <div style="width: 700px">
                <h3>{{$comment->id}}</h3>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" name="email{{$comment->id}}" value="{{$comment->email}}" class="form-control" id="formGroupExampleInput2" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="content{{$comment->id}}" class="form-control" rows="10" id="exampleFormControlTextarea1" rows="3">{{$comment->content}}</textarea>
                </div>

            </div>
                @endforeach
                <button class="btn btn-success"
                        type="submit"
                        id="edit_comments_button"
                        style=" width: 120px; margin-bottom:20px; "
                        name="edit" value="true">
                    Отправить
                </button>
            </div>

    </form>
    <script>
        $('#edit_comments_form').submit(function (e) {
            let form = new FormData(this);
            let button = $('#edit_comments_button');
            console.log(form);
            button.attr('disabled',true);
            ajaxRequest('/admin/comment/edit',form).done(function (res) {
                console.log(res);
                callMessage(res) ?  setTimeout(function (){
                    $(location).attr('href', '/admin/comments')
                },500) : button.removeAttr('disabled');
            });
            e.preventDefault();
        })
    </script>


@endsection
