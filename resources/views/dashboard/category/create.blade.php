@extends('layout.layout')

@section('content')
<h1>Crear Post</h1>
@include('fragments._errors-form')
<form action="{{ route('category.store') }}" method="post">
    @include('dashboard.category._form')
</form>    
@endsection