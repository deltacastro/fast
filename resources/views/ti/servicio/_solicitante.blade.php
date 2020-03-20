<h3>Datos del solicitante</h3>
<div class="row">
    <div class="col-12 col-md-12 col-lg-6">
        <div class="form-group row">
            <label for="select_userId" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <select id="select_userId" class="form-control" data-target="#select-departamentoId" name="user[id]">
                    @forelse ($users as $user)
                        <option value="{{$user->id}}" title="{{$user->persona->nombreCompleto()}}">{{$user->persona->nombre}}</option>
                    @empty
                        <option value="null" disabled>...</option>
                    @endforelse
                </select>
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6">
        <div class="form-group row">
            <label for="select-departamentoId" class="col-sm-2 col-form-label">Departamento</label>
            <div class="col-sm-10">
                <select id="select-departamentoId" class="custom-select" name="departamento[id]">

                </select>
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 col-xl-4">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Cargo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 col-xl-4">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 col-xl-4">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 col-xl-4">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Area</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 col-xl-4">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Hora</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="">
            </div>
        </div>
    </div>
</div>
