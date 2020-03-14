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
            <input class="form-control" type="text" name="people[nombre]" value="{{ isset($user) ? '' : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="people[paterno]">Apellido paterno</label>
            <input class="form-control" type="text" name="people[paterno]" value="{{ isset($user) ? '' : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="people[materno]">Apellido materno</label>
            <input class="form-control" type="text" name="people[materno]">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
    <h3>Datos empleado</h3>
    <div class="row">
        <div class="form-group col-12 col-lg-6">
            <label for="empleado[fecha_ingreso]">Fecha de ingreso</label>
            <input class="form-control" type="date" name="empleado[fecha_ingreso]" value="{{ isset($user) ? '' : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="empleado[estadoCivil_id]">Estado civil</label>
            {{-- <input class="form-control" type="text" name="empleado[estadoCivil_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select" id="empleado_departamento" name="empleado[estadoCivil_id]">
                {{-- <option value="null" selected disabled>Seeccione un departamento</option> --}}
                @forelse ($estadosCiviles as $estadoCivil)
                    <option value="{{$estadoCivil->id}}" title="{{$estadoCivil->nombre}}">{{$estadoCivil->nombre}}</option>
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
            <select class="custom-select no-validate" name="empleado_cargo" id="empleado_cargo">
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

            </tbody>
        </table>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('#departamento-cargo-agregar').on('click', function(){
            const table_tbody = $('#table-departamento-cargo').children('tbody')

            // Se instancian los selects
            const select_departamento = $('#empleado_departamento')
            const select_cargo = $('#empleado_cargo')

            // Se guardan los ids
            const departamento_id = select_departamento.val()
            const cargo_id = select_cargo.val()

            // Valdamos si existe

            if (validateRepeat(departamento_id, cargo_id)) {
                return true
            }

            // Se busca el elemento option seleccionado
            const option_departamento = select_departamento.children('option:selected')
            const option_cargo = select_cargo.children('option:selected')

            // Obtenemos el nombre del cargo y departamento
            const departamento_nombre = option_departamento.html()
            const cargo_nombre = option_cargo.html()

            // String aleatorio para relacion de elementos
            const random_string = Math.random().toString(36).substring(7);

            // Se crean los td's del departamento y cargo
            const td_departamento = `
                <input class="departamento" name="empleado_cargo[${random_string}][departamento_id]" value="${departamento_id}" hidden>
                ${departamento_nombre}
            `
            const td_cargo = `
                <input class="cargo" name="empleado_cargo[${random_string}][cargo_id]" value="${cargo_id}" hidden>
                ${cargo_nombre}
            `

            // Se crea elemento para el boton eliminar
            const button_delete = `
                <button type="button" data-id="${random_string}" class="form-control btn btn-danger departamento-cargo-eliminar">Eliminar</button>
            `

            // Extructura
            const table_row = `
                <tr style="display:none" id="${random_string}">
                    <td>
                        ${td_departamento}
                    </td>
                    <td>
                        ${td_cargo}
                    </td>
                    <td>
                        ${button_delete}
                    </td>
                </tr>
            `

            table_tbody.prepend(table_row)
            $(`#${random_string}`).fadeIn('fast')
        })
    })

    $('#table-departamento-cargo').on('click', '.departamento-cargo-eliminar', function(){
        deleteRow($(this).data('id'))
    })

    function deleteRow(idRow)
    {
        const element = $(`#${idRow}`)
        element.fadeOut('fast', function(){
            element.remove()
        })
    }

    function validateRepeat(departamento_id, cargo_id)
    {
        const table = $('#table-departamento-cargo')
        const selector = `input[value="${departamento_id}"][class="departamento"]`
        let exist = false
        const departamento = table
        .children('tbody')
        .find(selector)
        .each(function(index){
            let name = this.name
            name = name.replace('departamento_id', 'cargo_id')
            const cargo = table.find(`input[name="${name}"][value="${cargo_id}"]`)
            if (cargo.val() !== undefined) {
                exist = true
                return false
            }
        })
        return exist

    }
</script>
