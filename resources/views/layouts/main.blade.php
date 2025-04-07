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
@yield('style')
<body class="d-flex flex-column min-vh-100">

<header class="mb-4">
    <x-header />
</header>

@if(session()->has('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="toast-header">
                <svg class="bg-black text-black rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"><rect width="100%" height="100%" fill="#198754"></rect></svg>
                <strong class="me-auto">Успешно</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
@if(session()->has('message_errors'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="toast-header">
                <svg class="bg-black text-black rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"><rect width="100%" height="100%" fill="#fd7e14"></rect></svg>
                <strong class="me-auto">Внимание</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('message_errors') }}
            </div>
        </div>
    </div>
@endif

<main class="flex-grow-1 mt-1 mb-1">
    @yield('main')
</main>

<x-footer />

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastElList = [].slice.call(document.querySelectorAll('.toast'));
        toastElList.forEach(function (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    });
</script>

</body>
</html>
