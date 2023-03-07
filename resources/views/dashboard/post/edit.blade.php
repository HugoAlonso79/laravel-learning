@extends('layout.layout')

@section('content')
<h1>Actualizar Post: {{ $post->title }}</h1>
@include('fragments._errors-form')
<form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">@csrf
    @method('PATCH')
    @include('fragments._form', ["task" => "edit"])
</form>    
@endsection