<div id="usuarios-table" class="table-responsive">
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
                <th>Nombre</th>
                <th>Correo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td class="align-middle">{{$user->username}}</td>
                <td class="align-middle">{{$user->email}}</td>
                <td class="align-middle">
                    <a data-target="#modal-generic" class="edit-user" href="{{route('admin.user.edit', ['user' => $user])}}">
                        <i class="fas fa-user-edit fa-2x"></i>
                    </a>
                    <a
                        class="delete-user {{ $user->deleted_at == null ? 'text-success' : 'text-danger'}}"
                        data-target="#delete-form"
                        href="{{ $user->deleted_at == null ? route('admin.user.destroy', ['user' => $user]) : route('admin.user.restore', ['user' => $user]) }}"
                    >
                        {{-- <i class="fas fa-user-slash fa-2x"></i> --}}
                        <i class="fas fa-2x {{ $user->deleted_at == null ? 'fa-user' : 'fa-user-slash'}}"></i>
                    </a>
                </td>

            </tr>
            @empty
                <td colspan="5">Sin usuarios registrados</td>
            @endforelse
        </tbody>
    </table>
</div>
{!! $users->render() !!}
