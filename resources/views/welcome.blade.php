<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/js/app.js')
    @vite('resources/css/app.scss')
</head>

<body>
    <x-navigation />
    <x-header />
    <x-section.hero />
    <x-section.video />
    <x-section.mission />
    <x-section.projects />
    <x-section.offers_slider />
    <x-section.marquee />
    <x-section.features />
    <x-section.life />
    <x-section.connect />
</body>

</html>
