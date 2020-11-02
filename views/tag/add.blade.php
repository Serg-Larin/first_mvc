@extends('adminLayouts.layout')
@section('content')

<h1><b>New tag</b></h1>
<hr>
<div class="col-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput2">tag</label>
            <input type="text" name="tag" class="form-control" id="formGroupExampleInput2" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
