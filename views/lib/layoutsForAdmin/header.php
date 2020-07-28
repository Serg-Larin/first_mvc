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
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<body>

<div class="row">
    <nav class=" col-12 navbar navbar-expand-lg bg-dark">
        <div id="logo">
            <span style="font-size: 2em;">LOGO</span>
        </div>
        <div style="background-color: white;"><a href="/admin/logout">logout</a> </div>
    </nav>
    <div class="col-2 admin_list" style="min-height: 800px;">
        <a href="/admin/posts"><div><b><i class="fa fa-vote-yea"></i> Posts</b></div></a>
        <a href="/admin/categories"><div><b><i class="fas fa-align-justify"></i>Categories</b></div></a>
        <a href="/admin/tags"><div><b><i class="fas fa-tags"></i>Tags</b></div></a>
        <a href="/admin/users"><div><b><i class="fas fa-user"></i>Users</b></div></a>
    </div>
    <div class="col-10 content">