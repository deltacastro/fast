<form id="form-nuevoUsuario" action="{{route('admin.user.store')}}" method="POST">
    @csrf
    @method('POST')
    <h3>Datos de usuario</h3>
    <div class="row">
        <div class="form-group col-12 col-lg-6">
            <label for="username">Usuario</label>
            <input class="form-control" type="text" name="username" value="{{ isset($user) ? $user->username : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="email">Correo</label>
            <input class="form-control" type="email" name="email" value="{{ isset($user) ? $user->email : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="password">Confirmar contraseña</label>
            <input class="form-control" type="password" name="password_confirmation">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
    <h3>Datos personales</h3>
    <div class="row">
        <div class="form-group col-12">
            <label for="people[nombre]">Nombre</label>
            <input class="form-control" type="text" name="people[nombre]" value="{{ isset($user) ? $user->persona->nombre : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="people[paterno]">Apellido paterno</label>
            <input class="form-control" type="text" name="people[paterno]" value="{{ isset($user) ? $user->persona->paterno : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="people[materno]">Apellido materno</label>
            <input class="form-control" type="text" name="people[materno]" value="{{ isset($user) ? $user->persona->materno : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
    <h3>Datos empleado</h3>
    <div class="row">
        <div class="form-group col-12 col-lg-6">
            <label for="empleado[fecha_ingreso]">Fecha de ingreso</label>
            <input class="form-control" type="date" name="empleado[fecha_ingreso]" value="{{ isset($user->empleado) ? $user->empleado->fecha_ingreso->format('Y-m-d') : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="empleado[estadoCivil_id]">Estado civil</label>
            <select class="custom-select" name="empleado[estadoCivil_id]">
                @forelse ($estadosCiviles as $estadoCivil)
                    <option value="{{$estadoCivil->id}}" title="{{$estadoCivil->nombre}}" {{ isset($user->empleado) && $user->empleado->estadoCivil_id == $estadoCivil->id ? 'selected' : '' }}>{{$estadoCivil->nombre}}</option>
                @empty
                    <option value="null" disabled>...</option>
                @endforelse
            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
    <h4>Puestos</h4>
    <div class="row">
        <div class="form-group col-12 col-lg-5">
            <label for="empleado_departamento">Departamento</label>
            {{-- <input class="form-control" type="text" name="empleado_departamento[departamento_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select no-validate" id="empleado_departamento">
                {{-- <option value="null" selected disabled>Seeccione un departamento</option> --}}
                @forelse ($departamentos as $departamento)
                    <option value="{{$departamento->id}}" title="{{$departamento->descripcion}}">{{$departamento->nombre}}</option>
                @empty
                    <option value="null" disabled>No hay cargos agregados...</option>
                @endforelse

            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-5">
            <label for="empleado_cargo">Cargo</label>
            {{-- <input class="form-control" type="text" name="empleado_departamento[cargo_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select no-validate" id="empleado_cargo">
                {{-- <option value="null" selected disabled>Seleccione un cargo</option> --}}
                @forelse ($cargos as $cargo)
                    <option value="{{$cargo->id}}" title="{{$cargo->descripcion}}">{{$cargo->nombre}}</option>
                @empty
                    <option value="null" disabled>No hay cargos agregados...</option>
                @endforelse
            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-2">
            <label for="">.</label>
            <button type="button" id="departamento-cargo-agregar" class="form-control btn btn-primary">Agregar</button>
        </div>
    </div>
    <div class="table-responsive">

        <table id="table-departamento-cargo" class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($user))
                    @foreach ($user->departamentosCargos as $row)
                        <tr id="departamentoCargo{{ $row->departamento->id }}-{{ $row->cargo->id }}">
                            <td>
                                <input class="departamento" name="empleado_cargo[departamentoCargo{{ $row->departamento->id }}-{{ $row->cargo->id }}][departamento_id]" value="{{ $row->departamento->id }}" hidden>
                                {{ $row->departamento->nombre }}
                            </td>
                            <td>
                                <input class="cargo" name="empleado_cargo[departamentoCargo{{ $row->departamento->id }}-{{ $row->cargo->id }}][cargo_id]" value="{{ $row->cargo->id }}" hidden>
                                {{ $row->cargo->nombre }}
                            </td>
                            <td>
                                <button type="button" data-id="departamentoCargo{{ $row->departamento->id }}-{{ $row->cargo->id }}" class="form-control btn btn-danger departamento-cargo-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</form>

<script src="{{ asset('js/controller/usuarios/_form.js') }}"></script>
