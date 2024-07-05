<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home page {{$title}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>

<body>

    <h1> My bladeDirectives</h1>

    @if(!empty($users))
        Users not empty
    @else
        Users is empty
    @endif

    @isset($users)
        @foreach($users as $user)
        <h3> User name: {{$user['name']}}</h3>
        @endforeach
    @endisset

</body>
</html>
