<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"/>

    @vite('resources/css/notfound.css')
    @vite('resources/sass/app.scss')

    @vite('resources/js/app.js')
    @vite('resources/js/notfound.js')
</head>
<body>
@yield('content')
</body>
</html>
