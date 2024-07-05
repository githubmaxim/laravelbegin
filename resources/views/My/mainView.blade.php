@extends('layout.mainBlade')

{{--можно выводить секцию таким образом--}}
@section('title', $title ?? 'Default title')
{{--а можно таким--}}
@section('content')
<h1> My mainView</h1>
@endsection

