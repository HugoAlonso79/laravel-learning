@extends('layout.layout')

@section('content')
<h1>Crear Post</h1>
@include('fragments._errors-form')
<form action="{{ route('post.store') }}" method="post">
    @include('fragments._form')
</form>    
@endsection