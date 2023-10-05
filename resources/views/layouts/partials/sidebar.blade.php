<div class="sidebar-heading text-center py-4 primary-text fs-6 fw-bold text-uppercase text-side-bar">
    Controle de Estoque
</div>
<div class="list-group list-group-flush">

    @foreach (config('template.menus') as $menu)
        <a href="{{ $menu['url'] }}" class="list-group-item list-group-item-action bg-transparent second-text"><i
                class="{{ $menu['icon'] }} me-2"></i>{{ $menu['name'] }}</a>
    @endforeach

    @foreach (config('template.menusCollapse') as $menusCollapse)
        <a class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="list-group-item list-group-item-action bg-transparent nav-link dropdown-toggle second-text px-3"
                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="{{ $menusCollapse['icon'] }} me-2"></i>{{ $menusCollapse['nome'] }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item"
                                href="{{ $menusCollapse['url_A'] }}">{{ $menusCollapse['nome_A'] }}</a></li>
                        <li><a class="dropdown-item"
                                href="{{ $menusCollapse['url_B'] }}">{{ $menusCollapse['nome_B'] }}</a></li>
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
