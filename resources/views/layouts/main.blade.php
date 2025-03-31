<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/custom.css', 'resources/css/bootstrap.min.css', 'resources/js/app.js', ])
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <title>@yield('title')</title>
    @yield('meta')
</head>
<body class="d-flex flex-column min-vh-100">

<header class="mb-4">
    <x-header />
</header>

<main class="flex-grow-1 mt-1 mb-1">
    @yield('main')
</main>

<x-footer />

</body>
</html>
