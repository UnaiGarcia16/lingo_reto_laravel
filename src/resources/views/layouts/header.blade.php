<header>
    <link rel="stylesheet" href="{{ asset('css/reto_lingo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <img class="logo" src="{{ asset('images/mi-logo.png') }}" alt="Logo Lingo">
        <h1>LINGO</h1>
    <!-- ---------------------------------------------------------- -->
        <div class="imagenes">
            <a href="{{ route('ranking.index') }}" title="Estadísticas">
                <i class="fas fa-chart-pie"></i>
            </a>
            <a href="#" title="Cuenta">
                <i class="fas fa-user-circle" aria-hidden="true"></i>
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <!-- 🔑 CLAVE: Usamos asset() para garantizar la ruta absoluta desde el directorio public -->
               <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    <!-- ----------------------------------------------------------- -->
    </header>