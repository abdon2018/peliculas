@extends ("plantilla")

@section ("titulo")
Listado Peliculas
@endsection
@section ("principal")
    <h1>Mis peliculas</h1>
    <ul>
      <!-- sintaxis blade para estructuras de control -->
      <!-- forelse remplaza al "foreach" validando que haya contenido
      en el array, siempre acompaniado de la clausula empty -->
      @forelse ($peliculas as $pelicula)
        <li>
          {{-- Otro tipo de sintaxis es no tratar a la pelicula como si fuera un array
          sino tratarla como un objeto a travez del operador flecha
          <p>{{$pelicula["title"] }}</p> --}}
          <p><a href="/pelicula/{{$pelicula->id}}">{{$pelicula->title}}</a></p>

          @if ($pelicula->genero)
          <p>Genero: {{$pelicula->genero->name}}</p>
          @endif

          <p>Actores:</p>
          <ul>
            @foreach ($pelicula->actores as $actor)
              <li>
                {{$actor->getnombreCompleto()}} idRating: {{$actor->idRating()}}
              </li>
            @endforeach
          </ul>

          {{-- @if($pelicula["rating"] > 8) --}}
          @if($pelicula->rating > 8)
          <p>{{ "Exelente" }}</p>
          @else{{"pasable"}}
          @endif
        </li>
        @empty
        <p>No hay peliculas</p>
      @endforelse
    </ul>
     {{-- {{$peliculas->putear()}} --}}
@endsection
