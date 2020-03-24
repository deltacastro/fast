<form id="form-nuevoEquipo" action="{{route('ti.equipo.store')}}" method="POST">
    @csrf
    @method('POST')
    <h3>Registrar equipo</h3>
    <div class="row">
        <div class="form-group col-12">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="equipo[nombre]" value="{{ isset($equipo) ? $equipo->nombre : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12">
            <label for="email">Descripción</label>
            {{-- <input class="form-control" type="text" name="equipo[descripcion]" value="{{ isset($equipo) ? $equipo->descripcion : '' }}"> --}}
            <textarea class="form-control" name="equipo[descripcion]" rows="3">{{ isset($equipo) ? $equipo->descripcion : '' }}</textarea>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12">
            <label for="equipo[responsable_id]">Responsable</label>
            <select class="custom-select select2" name="equipo[responsable_id]">
                @forelse ($personas as $persona)
                    <option value="{{$persona->id}}" title="{{$persona->nombre}}" {{ isset($equipo->responsable) && $equipo->responsable->id == $persona->id ? 'selected' : '' }}>{{$persona->nombre}}</option>
                @empty
                    <option value="null" disabled>...</option>
                @endforelse
            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12">
            <label for="equipo[tipo_id]">Tipo de equipo</label>
            <select class="custom-select select2" name="equipo[tipo_id]">
                @forelse ($tiposEquipos as $tipoEquipo)
                    <option value="{{$tipoEquipo->id}}" title="{{$tipoEquipo->descripcion}}" {{ isset($equipo->tipo) && $equipo->tipo->id == $tipoEquipo->id ? 'selected' : '' }}>{{$tipoEquipo->nombre}}</option>
                @empty
                    <option value="null" disabled>...</option>
                @endforelse
            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
    <h3>Caracteristicas</h3>
    <h4>Software</h4>
    <h4>Sistema operativo</h4>
    <div class="row">
        <div class="form-group col-12 col-lg-5">
            <label for="so_id">Nombre</label>
            {{-- <input class="form-control" type="text" name="empleado_departamento[departamento_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select select2 select-parent" data-target="#so_version" id="so_id" name="so[id]">
                <option value="null" selected disabled>Seeccione</option>
                @forelse ($sistemasOperativos as $so)
                    <option value="{{$so->id}}" title="{{$so->descripcion}}">{{$so->nombre}}</option>
                @empty
                    <option value="null" disabled>No hay sistemas operativos agregados...</option>
                @endforelse

            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-5">
            <label for="so[version]">Versión</label>
            {{-- <input class="form-control" type="text" name="empleado_departamento[departamento_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select select2" id="so_version" name="so[version]">
                <option value="null" selected disabled>Seleccione una version</option>
                @forelse ($sistemasOperativos as $version)
                    <option value="{{$version->id}}" title="{{$version->descripcion}}">{{$version->nombre}}</option>
                @empty
                    <option value="null" disabled>No hay agregados...</option>
                @endforelse

            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-lg-5">
            <label for="equipo_software">Departamento</label>
            {{-- <input class="form-control" type="text" name="empleado_departamento[departamento_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select select2" id="equipo_software">
                <option value="null" selected disabled>Seeccione un departamento</option>
                @forelse ($programas as $programa)
                    <option value="{{$programa->id}}" title="{{$programa->descripcion}}">{{$programa->nombre}}</option>
                @empty
                    <option value="null" disabled>No hay programas agregados...</option>
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
                {{-- @forelse ($cargos as $cargo)
                    <option value="{{$cargo->id}}" title="{{$cargo->descripcion}}">{{$cargo->nombre}}</option>
                @empty
                    <option value="null" disabled>No hay cargos agregados...</option>
                @endforelse --}}
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

<script src="{{ asset('js/controller/ti/equipos/_form.js') }}"></script>
