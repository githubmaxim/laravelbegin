<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body>

<h1> My View4</h1>

{{--Способы получения данных из массива--}}
<script>
    let data1 = {!! json_encode($data) !!};
    let data2 = <?= json_encode($data) ?>;
    let data3 = {{\Illuminate\Support\Js::from($data)}};
    let data4 = {{Js::from($data)}};

    document.write('Name from "data1": ' + data1.name4 + '<br>');
    document.write('Name from "data2": ' + data2.name4 + '<br>');
    document.write('Name from "data3": ' + data3.name4 + '<br>');
    document.write('Name from "data4": ' + data4.name4 + '<br>');

</script>


<p>&copy; {{date('Y')}}</p>
</body>
</html>
