<div class="sidebar-heading text-center py-4 primary-text fs-6 fw-bold text-uppercase text-side-bar">
    <a href=" {{route('home.index')}} " class="text-decoration-none">
        Controle de Estoque
    </a>
</div>
<div class="list-group list-group-flush">

    <span class="px-3 management-sidebar">Gerenciamento</span>

    @foreach (config('template.menusManagement') as $menu)
        <a href="{{ $menu['url'] }}" class="list-group-item list-group-item-action bg-transparent second-text"><i
                class="{{ $menu['icon'] }} me-2"></i>{{ $menu['name'] }}</a>
    @endforeach

    <span class="px-3 title-sidebar">Movimentação</span>

    @foreach (config('template.menusMovement') as $menu)
        <a href="{{ $menu['url'] }}" class="list-group-item list-group-item-action bg-transparent second-text"><i
                class="{{ $menu['icon'] }} me-2"></i>{{ $menu['name'] }}</a>
    @endforeach

    <span class="px-3 title-sidebar">Análise</span>

    @foreach (config('template.menusAnalysis') as $menu)
    <a class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="list-group-item list-group-item-action bg-transparent nav-link dropdown-toggle second-text px-3"
                    href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="{{ $menu['icon'] }} me-2"></i>{{ $menu['name'] }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item"
                            href="{{ $menu['url_A'] }}">{{ $menu['name_A'] }}</a></li>
                    <li><a class="dropdown-item"
                            href="{{ $menu['url_B'] }}">{{ $menu['name_B'] }}</a></li>
                </ul>
            </li>
        </ul>
    </a>
    @endforeach


    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="route('logout')"
        onclick="event.preventDefault();
                    this.closest('form').submit();" class="list-group-item list-group-item-action bg-transparent text-danger">
            <i class="fas fa-power-off me-2"></i>Sair
        </a>
    </form>
</div>
