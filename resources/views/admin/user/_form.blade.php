<form id="form-nuevoUsuario" action="{{route('admin.user.store')}}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="username">Usuario</label>
        <input class="form-control" type="text" name="username" value="{{ isset($user) ? $user->username : '' }}">
        <span class="invalid-feedback" role="alert">
        </span>
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input class="form-control" type="email" name="email" value="{{ isset($user) ? $user->email : '' }}">
        <span class="invalid-feedback" role="alert">
        </span>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input class="form-control" type="password" name="password">
        <span class="invalid-feedback" role="alert">
        </span>
    </div>
    <div class="form-group">
        <label for="password">Confirmar contraseña</label>
        <input class="form-control" type="password" name="password_confirmation">
        <span class="invalid-feedback" role="alert">
        </span>
    </div>
</form>
