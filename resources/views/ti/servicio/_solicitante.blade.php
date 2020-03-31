<h3>Datos del solicitante</h3>
<div class="row">
    <div class="col-12 col-md-12 col-lg-6">
        <div class="form-group">
            <label for="select_userId">Nombre</label>
            <select id="select_userId" class="form-control select-parent select2" data-target="#select-departamentoId" name="user[id]">
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
    <div class="col-12 col-md-12 col-lg-6">
        <div class="form-group">
            <label for="select-departamentoId" class="">Departamento</label>
            <select id="select-departamentoId" class="form-control select2" name="departamento[id]">
            </select>
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
    </div>
</div>
<div class="row">
    {{-- <dl class="row px-3">
        <dt class="col-sm-3">Cargo</dt>
        <dd class="col-sm-9">
            <ul class="col- 5 list-group list-group-flush">
                <li class="list-group-item">cargo 1</li>
                <li class="list-group-item">cargo 2</li>
                <li class="list-group-item">cargo 3</li>
                <li class="list-group-item">cargo 4</li>
                <li class="list-group-item">cargo 5</li>
            </ul>
        </dd>

        <dt class="col-sm-3">Correo</dt>
        <dd class="col-sm-9">
            <p></p>
        </dd>

        <dt class="col-sm-3">Malesuada porta</dt>
        <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>

        <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
        <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa
            justo sit amet risus.</dd>

        <dt class="col-sm-3">Nesting</dt>
        <dd class="col-sm-9">
            <dl class="row">
                <dt class="col-sm-4">Nested definition list</dt>
                <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
            </dl>
        </dd>
    </dl> --}}
    {{-- <div class="col-12 col-md-12 col-lg-6 col-xl-4">
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
    </div> --}}
</div>
