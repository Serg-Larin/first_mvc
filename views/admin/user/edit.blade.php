@extends('admin.adminLayouts.layout')
@section('content')
    <h1><b>New user</b></h1>
    <hr>
    <div class="container">
        <div class="center-block">
            <form action="" id="user_edit_form" method="post" enctype="multipart/form-data" style="text-align: center;">
                <div class="row" id="edit">
                    <div class="col-6">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Login *</label>
                            <input type="text" value="{{$user->login}}" class="form-control required-fillable" name="login">
                            <input type="text" value="{{$user->id}}" name="id" hidden>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email *</label>
                            <input type="email" value="{{$user->email}}" class="form-control required-fillable" name="email">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Second password</label>
                            <input type="text" class="form-control" name="second_password">
                        </div>
                        <div class="form-group">
                            <label for="custom-select">type</label>
                            <div class="col-6">
                                <select class="custom-select" name="type" >
                                    <option value="1" @if($user->type == 1) selected @endif>blogger</option>
                                    <option value="2" @if($user->type == 2) selected @endif>admin</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="edit_user_button" name="submit" class="btn btn-primary">Submit</button>
                    </div>


                </div>
            </form>
        </div>
    </div>

    <script>
        $('#user_edit_form').submit(function (e) {
            let form = new FormData(this);
            let button = $('#edit_user_button');
            button.attr('disabled',true);

            ajaxRequest( '/admin/user/edit/{{$user->id}}',form).done(function (res) {
                console.log(res);
                callMessage(res) ?  setTimeout(function (){
                    $(location).attr('href', '/admin/users')
                },500) : button.removeAttr('disabled');
            });

            e.preventDefault();
        })
    </script>

@endsection
