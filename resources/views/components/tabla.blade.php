
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Tabla de {{ $titulo }}
                @if (Auth::user()->rol == 'admin')
                <br><button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#crear">Crear</button>

                @endif
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        @foreach ($columnas as $columna)
                            <th>
                                @if (array_key_exists('img', $columna))
                                    <img :src="$columna['img']">
                                @endif
                                <p>{{ $columna['text'] }}</p>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filas as $fila)
                        <tr>
                            @foreach ($fila as $key => $valor)
                                @if (!($key == "created_at" || $key == "updated_at"))
                                    <td>{{ $valor }}</td>
                                @endif
                            @endforeach
                            <td>
                                <form action="{{ route($destroy, [$fila->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    @if (Auth::user()->rol == 'admin')
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $tituloModal }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-formulario action="{{ route($tabla) }}" :inputs="$inputs" buttonText="Crear" />
            </div>
        </div>
    </div>
</div>


