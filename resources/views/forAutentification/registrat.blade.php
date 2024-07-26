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

    <title> login </title>
</head>

<body>
<h1>Регистрация</h1>
<form class="col-3 offset-4 border rounded" method="POST" action="{{ route('forAutent.registrat') }}">
    @csrf

{{--    <div class="form-group">--}}
{{--        <label for="name" class="col-form-label-lg">Имя</label>--}}
{{--        <input class="form-control" id="name" name="name" type="text" value="" placeholder="Имя">--}}
{{--        @error('name')--}}
{{--        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--        @enderror--}}
{{--    </div>--}}

    <div class="form-group">
        <label for="email" class="col-form-label-lg">Ваш email</label>
        <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="pasaword" class="col-form-label-lg">Пароль</label>
        <input class="form-control" id="password" name="password" type="password" value="" placeholder="Пароль">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary" name="sendMe" value="1">Войти</button>
    </div>

</form>
</body>
