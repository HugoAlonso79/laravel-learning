@extends('layout.master')

@section('content')
    {{ $name }}
    {{-- {{ $age }} --}}

    {{-- escapar html, renderizar html desde el controlador --}}
    {{-- {!! $html !!}  --}}

    {{-- comentarios --}}

    {{-- @if ($name == 'Alonso Negreyros')
        es true
    @else
        no es true
    @endif --}}

    {{-- @foreach ($array as $a)
        <div class="box item">
            <p>
                *{{$a}}
            </p>
        </div>
    @endforeach --}}

    <hr>

    @forelse ($posts as $post)
    <div class="box item">
        <p>
            *{{$post}}
        </p>
    </div>
    @empty
        No hay data
    @endforelse

    @include('fragments.subview')
@endsection

