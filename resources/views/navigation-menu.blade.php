<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><img src="https://superalfa.coop.br/themes/site/img/logo.png" alt="Logo" class="w-100 h-100"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item  {{ request()->routeIs('app.dashboard')?'active':'' }} ">
                    <a href="{{ route('app.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>{{ _('Dashboard') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('app.produtos','app.produtos.aprovados') ?'active':'' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>{{ __('Produtos') }}</span>
                    </a>
                    <ul class="submenu {{ request()->routeIs('app.produtos','app.produtos.aprovados')?'active':'' }}">
                        @if(auth()->user()->document && auth()->user()->phone && auth()->user()->fantasy)
                            <li class="submenu-item {{ request()->routeIs('app.produtos')?'active':'' }}">
                                <a href="{{ route('app.produtos') }}">{{ __('Em processo') }}</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('app.produtos.aprovados')?'active':'' }}">
                                <a href="{{ route('app.produtos.aprovados') }}">{{ __('Aprovados') }}</a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('app.profile.show')?'active':'' }} ">
                    <a href="{{ route('app.profile.show') }}" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>{{ __('Meus dados') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();" class='sidebar-link'>
                            <i class="bi bi-arrow-down-right"></i>
                            <span> {{ __('Sair do sistema') }}</span>
                        </a>
                    </form>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
