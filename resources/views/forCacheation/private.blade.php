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


    <title> private </title>
</head>

<body>
<h1>Это приватная страница</h1>
<p>Сюда попадают только аутентифицированные пользователи</p>


<h1> Vvod informaciy </h1>

<form class="col-3 offset-4 border rounded" method="POST" action="{{ route('forCache.store') }}">
    @csrf

    <div class="form-group">
        <label for="title" class="col-form-label-lg">Title</label>
        <input class="form-control" id="title" name="title" type="text" value="" placeholder="Title">
        @error('title')
        <div class="alert alert-danger">{{ $message }} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="context" class="col-form-label-lg">Context</label>
        <input class="form-control" id="context" name="context" type="text" value="" placeholder="Context">
        @error('context')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="day_created" class="col-form-label-lg">Day created</label>
        <input class="form-control" id="day_created" name="day_created" type="number" value="" placeholder="day_created">
        @error('day_created')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary" name="sendForCache" value="1">Enter</button>
    </div>

</form>
</body>
