@extends('layouts.master')

@section('titulo')
    Show
@endsection

@section('contenido')
    @if (session('mensaje'))
        <div class="alert alert-info">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="row p-5">
        <img src="{{ asset('assets/imagenes/transportistas') }}/{{ $transportista->imagen }}"
            style="width: 400px; heigth:400px">
        <h2>{{ $transportista->nombre }} {{ $transportista->apellidos }}</h2>
        <p>Años de permiso de conducción: {{ $transportista->getAniosPermiso() }}</p>
        <h5>Empresas</h5>
        <ul class="ms-4">
            @foreach ($transportista->empresas as $empresa)
                <li>{{ $empresa->nombre }}</li>
            @endforeach
        </ul>
        @foreach ($transportista->paquetes as $paquete)
            <div>
                <p>Paquete: {{ $paquete->id }} - {{ $paquete->direccion }}: <?php echo $paquete->entregado == 0 ? 'pendiente de entrega' : 'entregado'; ?></p>

            </div>
        @endforeach
        <form action="{{ route('transportistas.entregar', $transportista) }}" method="post">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-success" style="padding:8px;">
                Entregar todo
            </button>

        </form>
        <form action="{{ route('transportistas.noentregado', $transportista) }}" method="post">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-danger" style="padding:8px;margin-top:25px;">
                Marcar todo como no entregado
            </button>

        </form>
        <a type="button" class="btn btn-outline-dark" href="{{ route('transportistas.index') }}"
            style="width:300px;margin-top:25px"><i class="bi bi-caret-left-fill pe-2"></i>Volver al listado</a>

    </div>
@endsection
