@extends('adminLayouts.layout')
@section('content')
<h1><b>New category</b></h1>
<hr>
<div class="col-4">
    <form action="" method="post" id="add_category_form">
        <div class="form-group">
            <label for="formGroupExampleInput2">category</label>
            <input type="text" name="category" class="form-control" id="category_value">
        </div>
        <button type="submit" class="btn btn-primary" id="add_category_button">Submit</button>
    </form>
</div>

<script>
    $('#add_category_form').submit(function (e) {
        let form = new FormData(this);
        let button = $('#add_category_button');
        button.attr('disabled',true);

        $.ajax({
            url: '/admin/category/add',
            type: "POST",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function (res) {
            console.log(res);
            callMessage(res) ?  setTimeout(function (){
                $(location).attr('href', '/admin/categories')
            },500) : button.removeAttr('disabled');
        })
        e.preventDefault();
    })
</script>
@endsection
