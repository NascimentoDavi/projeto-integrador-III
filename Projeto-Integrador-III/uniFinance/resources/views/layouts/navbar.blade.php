<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('menu') }}">Minha Aplicação</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Link Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                </li>
                <!-- Link Perfil -->
                <li class="nav-item">
                </li>
                <!-- Exibição do nome e foto do usuário -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="rounded-circle" width="30" height="30">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
