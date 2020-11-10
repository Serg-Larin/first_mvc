<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/front-style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="/css/toastr.css">
    <script src="/js/toastr.js.map"></script>
    <script src="/js/toastr.min.js"></script>
    <script src="/js/functions.js"></script>
    <title>LOGIN</title>
</head>
<body>

<div class="container">
<div class="row justify-content-center" >
<div class="col-4 content" >
    <form id="auth_form" method="post">
        <div class="form-group" >
            <label for="emailOrLogin">Email</label>
            <input name="emailOrLogin" class="form-control" id="emailOrLogin" aria-describedby="emailHelp" placeholder="Enter email or login">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary" id="auth_button">Submit</button>
    </form>
</div>
</div>
</div>
<script>
    $('#auth_form').submit(function (e) {
        let form = new FormData(this);
        let button = $('#auth_button');
        button.attr('disabled',true);
        console.log(form);
        $.ajax({
            url: '/account/login',
            type: "POST",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function (res) {
            console.log(res);
            callMessage(res) ?  setTimeout(function (){
                $(location).attr('href', '/admin')
            },500) : button.removeAttr('disabled');
        })
        e.preventDefault();
    })
</script>
</body>
</html>
