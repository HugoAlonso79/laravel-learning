@extends('layout.layout')

@section('content')
<h1>Actualizar Post: {{ $category->title }}</h1>
@include('fragments._errors-form')
<form action="{{ route('category.update', $category->id) }}" method="post">@csrf
    @method('PATCH')
    @include('dashboard.category._form')
</form>    
@endsection