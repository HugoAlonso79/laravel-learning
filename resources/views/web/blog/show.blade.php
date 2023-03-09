@extends('web.layout')

@section('content')
    {{-- <h1>Listado</h1> --}}
    <x-web.post.show :post='$post'/>
@endsection 