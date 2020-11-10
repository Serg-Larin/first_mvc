<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin-style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"></script>
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/toastr.css">
    <script src="/js/toastr.js.map"></script>
    <script src="/js/toastr.min.js"></script>
    <script src="/js/functions.js"></script>
    <title>Document</title>
    <style>
        .required-fillable{
            border: 1px solid red;
        }
    </style>
</head>
<body>

<div class="row">
    <nav class=" col-12 navbar navbar-expand-lg bg-dark" id="admin_nav"
        style="
        display: flex;
        justify-content: space-between;

        "
    >

{{--        <div style="background-color: white;"><a href="/admin/logout">logout</a> </div>--}}
{{--        <div class="collapse navbar-collapse" id="navbarsExampleDefault">--}}


                <div class="nav-item dropdown" style="margin-right:50px; ">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{\controllers\Auth::user()->getImage()}}"
                             style="
                             height:50px;
                             width: 50px;
                             border-radius: 50%;
                             border: 1px solid #6897BB;
                            "
                        >
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="/admin/user/edit/{{\controllers\Auth::user()->id}}">profile</a>
                        <a class="dropdown-item" href="/admin/logout">logout</a>
                    </div>
                </div>
        <a href="/" style="text-decoration: none;">
                    <div style="
                padding: 5px;
                color: white;
                margin-left: 15px;
                border-radius: 5px;
                border: 2px solid lightblue;
                cursor: pointer;

        ">
                    На главную
                </div>
        </a>

{{--        </div>--}}
    </nav>

    <div class="col-2 admin_list" style="min-height: 800px;  padding-right: 0px;">
        <a href="/admin/posts"><div @if($_SERVER['REQUEST_URI']==='/admin/posts') class="admin_list_focus" @endif><b><i class="fa fa-vote-yea"></i>Posts</b></div></a>
        <a href="/admin/categories"><div @if($_SERVER['REQUEST_URI']==='/admin/categories')class="admin_list_focus"@endif><b><i class="fas fa-align-justify"></i>Categories</b></div></a>
        <a href="/admin/tags"><div @if($_SERVER['REQUEST_URI']==='/admin/tags')class="admin_list_focus"@endif><b><i class="fas fa-tags"></i>Tags</b></div></a>
        <a href="/admin/users"><div @if($_SERVER['REQUEST_URI']==='/admin/users')class="admin_list_focus"@endif><b><i class="fas fa-user"></i>Users</b></div></a>
        <a href="/admin/comments"><div @if($_SERVER['REQUEST_URI']==='/admin/comments')class="admin_list_focus"@endif><b><i class="fas fa-comment"></i>Comment</b></div></a>
    </div>
    <div class="col-10 content">


    @yield('content')


    </div>
    <div class="col text-center py-4 bg-dark">
        © 2020 Sergo
    </div>
</div>
<!--<script src="../docsupport/prototype-1.7.0.0.js" type="text/javascript"></script>-->
<!--<script src="../chosen.proto.js" type="text/javascript"></script>-->
<!--<script src="../docsupport/prism.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script src="../docsupport/init.proto.js" type="text/javascript" charset="utf-8"></script>-->
<script src="/js/BsMultiSelect.js"></script>
</body>
</html>
