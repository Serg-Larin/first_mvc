<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/front-style.css">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="/lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/front-style.css">
    <title><?php echo isset($arg['blogName']) ? $arg['blogName'] : 'Blogich';?></title>
    <style>
        /*posts*/
        .post{
            min-height: 570px;
            margin: 10px;
        }
        .post_image{
            width: 100%;
            height: 55%;
            margin-top: 15px;
        }
        /*posts*/
        .common{
            height: 200px;
        }
        .tags{
            line-height: 2.2;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            overflow: auto;
        }
        .categories{
            line-height: 2.2;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            overflow: auto;
        }
        span .tags{
            max-width: 200px;
            overflow: hidden;
        }
        a div span{
            padding-left: 10px;
        }
        h2{
            border-bottom: 1px solid black;
            padding-bottom: 3px;
        }
        .tags span{
            border-radius: 5px;
            padding: 5px;
            margin: 2px;
            line-height: 2.2;
            background-color: red;
            color: #eeeeee;
        }
        .categories span{
            border-radius: 5px;
            padding: 5px;
            margin: 2px;
            line-height: 2.2;
            background-color: #9d9d9d;
            color: #eeeeee;
        }
        .col-2{
            padding: 0;
        }
        a div{
            text-decoration: none;
            padding: 5px 0 0 15px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        .col-2 a div{
            text-decoration: none;
            transition: 1s linear;
        }
        .col-2 a div:hover{

            background: linear-gradient(to right, #fff,#FF0000);
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg justify-content-center" style="min-height: 800px; width:100%; margin-bottom: 10px; padding: 0;
    background:url('/images/2.webp') no-repeat;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%;
">
    <h1 style="background: white; font-size: 5em;"><?php echo isset($arg['blogName']) ? $arg['blogName'] : 'BLOGICH';?></h1>
</nav>
<div class="container-fluid">
    <div class="row justify-content-end">

