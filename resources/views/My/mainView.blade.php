@extends('layout.mainBlade')

{{--можно выводить секцию таким образом--}}
@section('title', $title ?? 'Default title') {{--при вызове через @yield('title') в главном виде мы вызовем переменную $title (если она есть) или значение по умолчанию --}}

{{--а можно таким--}}
@section('content')
<h1> My mainView</h1>
@endsection

