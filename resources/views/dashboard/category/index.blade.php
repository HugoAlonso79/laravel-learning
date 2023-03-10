@extends('layout.layout')

@section('content')

    <a href="{{ route('category.create') }}">Crear</a>

    <table class="table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
            <tr>
                <td>{{ $c->title }}</td>
                <td>
                    <a href="{{ route('category.edit', $c) }}">Editar</a>
                    <a href="{{ route('category.show', $c) }}">Ver</a>
                    <form action="{{ route('category.destroy', $c) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection