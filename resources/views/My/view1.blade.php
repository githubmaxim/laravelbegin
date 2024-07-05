<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home page {{$title}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>

    <body>

    <nav>
        <ul>
            <li><a href="/views1">view1</a> </li>
            <li><a href="/views2">view2</a> </li>
            <li><a href="/views3">view3</a> </li>
        </ul>
    </nav>

        <h1> My Welcome</h1>
        <h3> Name: {{$name}}</h3>
        <h4> Age: {{ $age }}</h4>
        <h5> title: {{ $title }}</h5>
        <h5> Shared variable from class "AppServiceProvider":  {{ $myVariable }}</h5>
    </body>
</html>
