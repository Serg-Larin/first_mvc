@extends('admin.adminLayouts.layout')
@section('content')
<h1><b>Edit category</b></h1>
<hr>
<div class="col-4">
<form action="" method="post" id="edit_category_form">
<div class="form-group">
    <label for="formGroupExampleInput2">category</label>
    <input type="text" class="form-control" name="category" value="{{$category->name}}" id="formGroupExampleInput2" >
    <input type="text" name="id" value="{{$category->id}}" hidden="hidden">
</div>
    <button type="submit" class="btn btn-primary" id="edit_category">Submit</button>
</form>
    </div>

<script>
    $('#edit_category_form').submit(function (e) {
        let form = new FormData(this);
        let button = $('#edit_category');
        button.attr('disabled',true);
        ajaxRequest( '/admin/category/edit/{{$category->id}}',form).done(function (res) {
                console.log(res);
                callMessage(res) ?  setTimeout(function (){
                    $(location).attr('href', '/admin/categories')
                },500) : button.removeAttr('disabled');
            });
        e.preventDefault();
    })
</script>
@endsection
