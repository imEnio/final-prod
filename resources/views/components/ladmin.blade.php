<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"/>

    @vite('resources/css/admin/main.css')
    @vite('resources/sass/app.scss')

    @vite('resources/js/app.js')
    @vite('resources/js/admin/main.js')
</head>
<body>
{{$slot}}
</body>
</html>
