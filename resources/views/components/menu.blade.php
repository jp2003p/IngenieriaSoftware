<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('main') }}" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">Servilimpio</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">ServiLimpio</a></li>
                <li><a href="#about">Sobre nosotros</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#pricing">Precios</a></li>
                <li><a href="#contact">Contactanos</a></li>

                @auth
                    <li><a href="#comments">Comentarios</a></li>
                    <li class="bg-light rounded-circle"><a href="">
                        <span>0</span>    
                        <i class="bi bi-cart-fill"></i> </a></li>
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#"></a></li>
                            <!--
                                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                                            <ul>
                                                <li><a href="#">Deep Dropdown 1</a></li>
                                                <li><a href="#">Deep Dropdown 2</a></li>
                                                <li><a href="#">Deep Dropdown 3</a></li>
                                                <li><a href="#">Deep Dropdown 4</a></li>
                                                <li><a href="#">Deep Dropdown 5</a></li>
                                            </ul>
                                        </li>-->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar
                                    sesión</a>
                            </form>

                            <li><a href="{{ route('services') }}">Servicios</a></li>
                            <li><a href="{{ route('pedidos') }}">Pedidos</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @auth
        @else
            <a class="btn-getstarted" href="{{ route('login') }}">Acceder</a>
        @endauth


    </div>
</header>
