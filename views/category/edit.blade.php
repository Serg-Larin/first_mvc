@extends('adminLayouts.layout')
@section('content')
<h1><b>Edit category</b></h1>
<hr>
<div class="col-4">
<form action="" method="post">
<div class="form-group">
    <label for="formGroupExampleInput2">category</label>
    <input type="text" class="form-control" name="category" value="{{$category->name}}" id="formGroupExampleInput2" >
    <input type="text" name="id" value="{{$category->getId()}}" hidden="hidden">
</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

@endsection
