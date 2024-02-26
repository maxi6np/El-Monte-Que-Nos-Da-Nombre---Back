@extends('layouts.master')

@section('titulo')
    Cuadro
@endsection

@section('contenido')
    <div class="row" style="margin: 100px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir nuevo Paquete
                </div>
                <div class="card-body" style="padding:30px">
                    <form action="{{ route('paquetes.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fecha">Direccion de entrega del paquete</label>
                            <input type="text" name="direccion" id="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion">Transportista</label>
                            <select name="transportista" id="transportista">
                                @foreach ($transportistas as $transportista)
                                    <option value="{{ $transportista['id'] }}">{{ $transportista['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control" rows="3" required></input>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success" style="padding:8px 100px;margin-top:25px;">
                                Añadir paquete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
