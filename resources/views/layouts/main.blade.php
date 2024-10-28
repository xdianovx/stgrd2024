<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>СТРОЙГРАД</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <script src="https://api-maps.yandex.ru/v3/?apikey=910fc974-dd76-4b37-979f-f5ee82a8b8e8&lang=ru_RU"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-navigation />
    <x-header />
    @yield('content')
    <x-footer />
</body>

</html>
