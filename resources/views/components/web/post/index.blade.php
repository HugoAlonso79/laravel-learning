<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    {{-- <h1>Hola mundo soy un componente anonimo</h1> --}}
    {{ $slot }}
    @foreach ($posts as $p)
        <div>
            <h3 class="text-lg"> {{ $p->title }}</h3>
            <p class="text-sm"> {{ $p->description }} </p>
            <a href="{{ route('web.blog.show', $p) }}">Ir</a>
        </div>
    @endforeach
    {{ $posts->links() }}
</div>