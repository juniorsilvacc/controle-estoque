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
        <a href="{{ $menu['url'] }}" class="list-group-item list-group-item-action bg-transparent second-text"><i
                class="{{ $menu['icon'] }} me-2"></i>{{ $menu['name'] }}</a>
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
