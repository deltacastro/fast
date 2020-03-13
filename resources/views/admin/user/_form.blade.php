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
            <input class="form-control" type="text" name="empleado[estadoCivil_id]" value="{{ isset($user) ? '' : '' }}">
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
    <h4>Puestos</h4>
    <div class="row">
        <div class="form-group col-12 col-lg-5">
            <label for="empleado_departamento[departamento_id]">Departamento</label>
            {{-- <input class="form-control" type="text" name="empleado_departamento[departamento_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select" name="empleado_departamento[departamento_id]" id="">
                <option value="null" selected disabled>Seeccione un departamento</option>
                <option value="">Opc 1</option>
                <option value="">Opc 2</option>
                <option value="">Opc 3</option>

            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-5">
            <label for="empleado_departamento[cargo_id]">Cargo</label>
            {{-- <input class="form-control" type="text" name="empleado_departamento[cargo_id]" value="{{ isset($user) ? '' : '' }}"> --}}
            <select class="custom-select" name="empleado_departamento[cargo_id]" id="">
                <option value="null" selected disabled>Seleccione un cargo</option>
                <option value="">Opc 1</option>
                <option value="">Opc 2</option>
                <option value="">Opc 3</option>
            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group col-12 col-lg-2">
            <label for="">.</label>
            <button class="form-control btn btn-primary">Agregar</button>
        </div>
    </div>
    <div class="table-responsive">

        <table class="table table-striped">
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
