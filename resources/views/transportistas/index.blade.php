@extends('layouts.master')

@section('titulo')
    Index
@endsection

@section('contenido')
    <div class="row">
        <div class="g-3 d-flex flex-wrap">
            @foreach ($transportistas as $transportista)
                <div class="border m-5">
                    <a href="{{ route('transportistas.show', $transportista) }}">
                        <img src="{{ asset('assets/imagenes/transportistas') }}/{{ $transportista->imagen }}" alt=""
                            style="width: 200px">
                    </a>
                    <h3>{{ $transportista->nombre }}</h3>
                    <p>{{ $transportista->paquetesPendientes->count() }} pendientes de entrega</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
