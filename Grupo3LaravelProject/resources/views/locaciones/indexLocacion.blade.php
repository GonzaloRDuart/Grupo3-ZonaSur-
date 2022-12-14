@extends('base')
@section('contenido')
    <h1>Listado de locaciones</h1>

    <form action="{{ route('locaciones.create') }}">
        <button type="submit" class="btn btn-secondary">Crear nueva locacion</button>
    </form>

    <table class="table table">
        <thead>
        <tr>
            <th scope="col">Ciudad</th>
            <th scope="col">Calle</th>
            <th scope="col">Altura</th>
            <th scope="col">Piso</th>
            <th scope="col">Depto</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>
        @foreach ($locaciones_global as $locacion)
        <tr>
            <td><a href="{{ route('locaciones.show', $locacion->id) }}">{{ $locacion->ciudad }}</a></td>
            <td>{{ $locacion->calle }}</td>
            <td>{{ $locacion->altura }}</td>
            <td>{{ $locacion->piso }}</td>
            <td>{{ $locacion->depto }}</td>
            <td><form action="{{ route('locaciones.edit', $locacion->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-warning">Editar</button>
                </form>
            </td>
            <td>
                <form action="{{ route('locaciones.destroy', $locacion->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar {{ $locacion->ciudad }}?')" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection('contenido')



