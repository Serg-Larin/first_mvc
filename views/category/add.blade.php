@extends('adminLayouts.layout')
@section('content')
<h1><b>New category</b></h1>
<hr>
<div class="col-4">
    <form action="/admin/category/add" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput2">category</label>
            <input type="text" name="category" class="form-control" id="category_value" >
        </div>
        <button type="submit" class="btn btn-primary" id="add_category_button">Submit</button>
    </form>
</div>
@endsection
