<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@section('title')Page @show</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            padding-left:20px;
        }
        html,
        body,
        .wrapper {
            height: 100%;
        }
        .header {
            padding: 20px 20px 0 0;
            text-align: right;
        }
        .content {
            min-height: 80%;
            padding-bottom: 50px;
        }
        .footer {
            height: 30px;
            margin-top: -50px;
        }
        h1 {
            margin: 0 0 30px 0;
        }
        .header_link {
            margin-left: 50px;
            font-size: 25px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        @include('blocks.menu')
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        This is footer
    </div>
</div>
</body>
</html>
