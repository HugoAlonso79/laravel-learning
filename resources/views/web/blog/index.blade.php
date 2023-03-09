@extends('web.layout')

@section('content')
    {{-- <h1>Listado</h1> --}}
    <x-web.post.index :posts='$posts'>
        <h1 class="text-2xl">Listado principal de posts</h1>
    </x-web.post.index>
@endsection 