<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($arg['blogName']) ? $arg['blogName'] : 'Blogich';?></title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="/css/toastr.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="/js/toastr.js.map"></script>
    <script src="/js/toastr.min.js"></script>
    <script src="/js/functions.js"></script>
    <link rel="stylesheet" href="">
    <!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">-->
    <!--    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">-->
    <!--    <link rel="stylesheet" href="/lib/fontawesome-free-5.13.0-web/css/all.min.css">-->

    <link rel="stylesheet" href="/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->

</head>
<div class="content">

    @yield('content')

    <footer>FOOTER</footer>
</div>
</div>

</body>
</html>
