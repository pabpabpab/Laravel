<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel > About project</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
            padding-left:20px;
        }

        * {
            margin: 0;
            padding: 0;
        }
        html,
        body,
        .wrapper {
            height: 100%;
        }
        .content {
            box-sizing: border-box;
            min-height: 100%;
            padding-bottom: 50px;
        }
        .footer {
            height: 30px;
            margin-top: -50px;
        }
        .footer_link{margin-right:50px;font-weight:bold;font-size:25px;}
    </style>
</head>
<body class="antialiased">
<div class="wrapper">
    <div class="content">
        <h1>Агрегатор новостей</h1>
    </div>
    <div class="footer">
        @if ($routeName != 'hello')
            <a href="/hello" class="footer_link">Hello</a>
        @endif
        @if ($routeName != 'about')
            <a href="/about" class="footer_link">About</a>
        @endif
        @if ($routeName != 'news')
            <a href="/news" class="footer_link">News</a>
        @endif
    </div>
</div>
</body>
</html>
