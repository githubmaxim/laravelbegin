<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{--    <title> @yield('title') </title>--}}

    <!-- Fonts -->
{{-- Подключение Bootstrap-а  --}}
{{-- 1. напрямую, когда файлы находятся в папке "public" --}}
{{--    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('main.css')}}">--}}
{{-- 2. с помощью программы Vite и ее файла "vite.config.js"--}}
{{--    @vite(['resources/bootstrap/bootstrap.bundle.js', 'resources/bootstrap/bootstrap.css', 'resources/css/main.css'])--}}
{{-- 3. файл "bootstrap.css" будет скачиваться с интернета --}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.main.css">--}}

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>

<body>


@yield('content')


<p>&copy; {{date('Y')}}</p>

@include('layout.incs.footer2')

{{--Подключаем bootstrap--}}
{{--<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>--}}
</body>
</html>
