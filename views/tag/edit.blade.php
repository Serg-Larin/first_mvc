@extends('adminLayouts.layout')
@section('content')

<h1><b>Edit tag</b></h1>
<hr>
<div class="col-4">
    <form action="" method="post" id="edit_tag_form">
        <div class="form-group">
            <label for="formGroupExampleInput2">tag</label>
            <input type="text" name="tag" class="form-control" id="formGroupExampleInput2" value="{{$tag->name}}">
            <input type="text" name="id" value="{{$tag->id}}" hidden="hidden">
        </div>
        <button type="submit" class="btn btn-primary" id="edit_tag_button">Submit</button>
    </form>
</div>

<script>
    $('#edit_tag_form').submit(function (e) {
        let form = new FormData(this);
        let button = $('#edit_tag_button');
        button.attr('disabled',true);

        $.ajax({
            url: '/admin/tag/edit/{{$tag->id}}',
            type: "POST",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function (res) {
            console.log(res);
            callMessage(res) ?  setTimeout(function (){
                $(location).attr('href', '/admin/tags')
            },500) : button.removeAttr('disabled');
        })
        e.preventDefault();
    })
</script>
@endsection
