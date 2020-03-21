<div id="#equipos-table" class="table-responsive">
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('delete')
    </form>
    <form id="restore-form" method="POST" style="display: none;">
        @csrf
        @method('put')
    </form>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Responsable</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipos as $equipo)
                <tr>
                    <td>{{ isset($equipo->tipo) ? $equipo->tipo->nombre : 'Sin dato' }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ isset($equipo->responsable) ? $equipo->responsable->nombre : 'Sin dato' }}</td>
                    <td>
                        <a href="" class="btn btn-warning">Editar</a>
                        <a href="" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td><p>No hay datos</p></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{!! $equipos->render() !!}
