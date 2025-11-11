@extends('layouts.app')

@section('content')
<div class="ranking-container">
    <h1>🏆 Tabla de Posiciones</h1>

    @if ($ranking->isEmpty())
        <p class="no-data">Aún no hay datos de ranking para mostrar.</p>
    @else
        <table class="ranking">
            <thead>
                <tr>
                    <th>#</th>          {{-- Posición en el Ranking (calculada con $key + 1) --}}
                    <th>ID (BD)</th>    {{-- Nueva columna para el ID de la tabla --}}
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Racha Más Alta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ranking as $key => $item)
                <tr class="{{ $key < 3 ? 'top-three' : '' }}">
                    <td class="pos">{{ $key + 1 }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>   {{-- CORREGIDO: Acceso directo al campo 'nombre' --}}
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->racha }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection