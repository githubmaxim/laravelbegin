<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    {{-- Подключение Bootstrap-а  --}}
    {{-- 1. напрямую, когда в папке "public" находятся файлы "main.css" u "ocean_1280.jpg" + папка "bootstrap" с файлами "bootstrap.bundle.js" u "bootstrap.css" --}}
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('main.css')}}">
    {{-- 2. с помощью программы Vite и ее файла "vite.config.js"--}}
    {{--        @vite(['resources/bootstrap/bootstrap.bundle.js', 'resources/bootstrap/bootstrap.css', 'resources/css/main.css'])--}}
    {{-- 3. файл "bootstrap.css" будет скачиваться с интернета --}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.main.css">--}}

    {{--    этот файл он (я так понимаю) Laravel подставляет и без меня (автоматом) если нет подключения Bootstrap-а--}}
    {{--    <link href="{{ asset('css/app.css') }}">--}}


    <title> login </title>
</head>

<body>
<h1>Почтовое сообщение</h1>
<h1>отправляю на эл.адрес: {{$forMail->email}}</h1>
</body>
