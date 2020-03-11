<div class="nav-side-menu sidebar">
    <div class="brand bg-info">
        <img src="{{asset('/images/logoPlataformaSolo.png')}}" class="img-fluid" alt="">
        {{-- Apprender --}}
    </div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">

            <li data-toggle="collapse" data-target="#perfil" class="collapsed active">
                <a href="#"><i class="fas fa-user-tie fa-lg"></i> Abel castro <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="perfil">
                <li>
                    <a href="">
                        Mi perfíl
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

            <li data-toggle="collapse" data-target="#administrador" class="collapsed active">
                <a href="#"><i class="fas fa-users-cog fa-lg"></i> Adminsitrador <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="administrador">
                <li>
                    <a href="">
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="">
                        Contenido
                    </a>
                </li>
            </ul>

            <li>
                <a class="d-block" href="">
                    <i class="fas fa-tachometer-alt fa-lg"></i> Dashboard
                </a>
            </li>

            {{-- <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="#"><i class="fab fa-fort-awesome-alt fa-lg"></i> Services <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="service">
                <li>New Service 1</li>
                <li>New Service 2</li>
                <li>New Service 3</li>
            </ul> --}}

            {{-- <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fab fa-pagelines fa-lg"></i> New <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li>New New 1</li>
                <li>New New 2</li>
                <li>New New 3</li>
            </ul> --}}
        </ul>
    </div>
</div>
