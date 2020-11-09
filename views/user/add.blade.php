@extends('adminLayouts.layout')
@section('content')

    <h1><b>New user</b></h1>
    <hr>
            <form method="post" id="add_user_form" enctype="multipart/form-data" style="width: 600px">
                <div class="col-6">
                    <div class="form-group">
                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Login *</label>
                    <input type="text" name="login" class="required-fillable form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email *</label>
                    <input type="email" name="email" class="required-fillable form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Password *</label>
                    <input type="text" name="password" class="required-fillable form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Same password *</label>
                    <input type="text" name="second_password" class="required-fillable form-control" >
                </div>
                <div class="form-group">
                    <label for="custom-select">type</label>
                    <div class="col-6">
                    <select class="custom-select" id="custom-select" name="type">
                        <option value="1">blogger</option>
                        <option value="2">admin</option>
                    </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" id="add_user_button">Submit</button>

    </form>


    <script>
        $('#add_user_form').submit(function (e) {
            let form = new FormData(this);
            let button = $('#add_user_button');
            button.attr('disabled',true);

            $.ajax({
                url: '/admin/user/add',
                type: "POST",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function (res) {
                console.log(res);
                callMessage(res) ?  setTimeout(function (){
                    $(location).attr('href', '/admin/users')
                },500) : button.removeAttr('disabled');
            })
            e.preventDefault();
        })
    </script>

@endsection
