<div id="sidebar" class="{{ $show_menu ? 'active' : '' }}">
    <div class="sidebar-wrapper {{ $show_menu ? 'active' : '' }}">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}"><img
                            src="https://superalfa.coop.br/themes/site/img/logo.png" alt="Logo"
                            class="w-100 h-100"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide {{ $show_menu ? 'd-xl-none' : '' }} d-block"><i
                            class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item  {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} ">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('admin.profile.show') ? 'active' : '' }} ">
                    <a href="{{ route('admin.profile.show') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>{{ __('Meus dados') }}</span>
                    </a>
                </li>
                @canany(['admin.fornecedores', 'admin.users', 'admin.roles', 'admin.permissions', 'admin.logs'])
                    <li
                        class="sidebar-item  {{ request()->routeIs('admin.fornecedores', 'admin.users', 'admin.permissions', 'admin.roles', 'admin.fornecedores', 'admin.logs') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>{{ __('Operacional') }}</span>
                        </a>
                        <ul
                            class="submenu {{ request()->routeIs('admin.fornecedores', 'admin.users', 'admin.permissions', 'admin.roles', 'admin.logs') ? 'active' : '' }}">
                            @can('admin.users')
                                <li class="submenu-item  {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                                    <a href="{{ route('admin.users') }}">{{ __('Usuários') }}</a>
                                </li>
                            @endcan
                            @can('admin.fornecedores')
                                <li class="submenu-item  {{ request()->routeIs('admin.fornecedores') ? 'active' : '' }}">
                                    <a href="{{ route('admin.fornecedores') }}">{{ __('Fornecedores') }}</a>
                                </li>
                            @endcan
                            @can('admin.roles')
                                <li class="submenu-item  {{ request()->routeIs('admin.roles') ? 'active' : '' }}">
                                    <a href="{{ route('admin.roles') }}">{{ __('Acessos') }}</a>
                                </li>
                            @endcan
                            @can('admin.permissions')
                                <li class="submenu-item  {{ request()->routeIs('admin.permissions') ? 'active' : '' }}">
                                    <a href="{{ route('admin.permissions') }}">{{ __('Permissões') }}</a>
                                </li>
                            @endcan
                            @can('admin.logs')
                                <li class="submenu-item  {{ request()->routeIs('admin.logs') ? 'active' : '' }}">
                                    <a href="{{ route('admin.logs') }}">{{ __('Logs') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['admin.produtos.erp.create', 'admin.clusters', 'admin.bc', 'admin.lojas', 'admin.coperats',
                    'admin.medidas', 'admin.familia-produtos'])
                    <li
                        class="sidebar-item  {{ request()->routeIs('admin.produtos.erp.create', 'admin.clusters', 'admin.segmentos', 'admin.bc', 'admin.coperats', 'admin.medidas', 'admin.familia-produtos') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>{{ __('Cadastros') }}</span>
                        </a>
                        <ul
                            class="submenu {{ request()->routeIs('admin.lojas', 'admin.segmentos', 'admin.clusters', 'admin.sub-segmentos', 'admin.bc', 'admin.coperats', 'admin.medidas', 'admin.familia-produtos') ? 'active' : '' }}">
                            @can('admin.lojas')
                                <li class="submenu-item {{ request()->routeIs('admin.lojas') ? 'active' : '' }}">
                                    <a href="{{ route('admin.lojas') }}">{{ __('Lojas') }}</a>
                                </li>
                            @endcan
                            @can('admin.lojas')
                                <li class="submenu-item {{ request()->routeIs('admin.clusters') ? 'active' : '' }}">
                                    <a href="{{ route('admin.clusters') }}">{{ __('Clusters') }}</a>
                                </li>
                            @endcan
                            @can('admin.familia-produtos')
                                <li class="submenu-item {{ request()->routeIs('admin.familia-produtos') ? 'active' : '' }}">
                                    <a href="{{ route('admin.familia-produtos') }}">{{ __('Familias') }}</a>
                                </li>
                            @endcan
                            @can('admin.produtos.erp.create')
                                <li
                                    class="submenu-item {{ request()->routeIs('admin.produtos.erp.create') ? 'active' : '' }}">
                                    <a href="{{ route('admin.produtos.erp.create') }}">{{ __('Cadastro ERP') }}</a>
                                </li>
                            @endcan
                            @can('admin.bc')
                                <li class="submenu-item {{ request()->routeIs('admin.bc') ? 'active' : '' }}">
                                    <a href="{{ route('admin.bc') }}">{{ __('BC') }}</a>
                                </li>
                            @endcan
                            @can('admin.coperats')
                                <li class="submenu-item {{ request()->routeIs('admin.coperats') ? 'active' : '' }}">
                                    <a href="{{ route('admin.coperats') }}">{{ __('Coperat') }}</a>
                                </li>
                            @endcan
                            @can('admin.segmentos')
                                <li class="submenu-item {{ request()->routeIs('admin.segmentos') ? 'active' : '' }}">
                                    <a href="{{ route('admin.segmentos') }}">{{ __('Tipo de embalagem') }}</a>
                                </li>
                            @endcan
                            @can('admin.sub-segmentos')
                                <li class="submenu-item {{ request()->routeIs('admin.sub-segmentos') ? 'active' : '' }}">
                                    <a href="{{ route('admin.sub-segmentos') }}">{{ __('Tamanho de embalagem') }}</a>
                                </li>
                            @endcan
                            @can('admin.medidas')
                                <li class="submenu-item {{ request()->routeIs('admin.medidas') ? 'active' : '' }}">
                                    <a href="{{ route('admin.medidas') }}">{{ __('Unidade de medida') }}</a>
                                </li>
                            @endcan
                            <li class="submenu-item">
                                <a target="_blank"
                                    href="{{ route('admin.verendpoint') }}">{{ __('Ver Endpoint') }}</a>
                            </li>

                        </ul>
                    </li>
                @endcanany
                @canany(['admin.produtos.descriptions', 'admin.compras.aprovados', 'admin.produtos', 'admin.estoques',
                    'admin.produtos.arquivados', 'admin.compras', 'admin.marketing', 'admin.cadastros', 'admin.concluidos'])
                    <li
                        class="sidebar-item  {{ request()->routeIs('admin.produtos.imagens', 'admin.produtos.status', 'admin.produtos.descriptions', 'admin.compras.aprovados', 'admin.produtos', 'admin.estoques', 'admin.compras', 'admin.marketing', 'admin.cadastros', 'admin.concluidos', 'admin.produtos.arquivados') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>{{ __('Produtos') }}</span>
                        </a>
                        <ul
                            class="submenu {{ request()->routeIs('admin.produtos.imagens', 'admin.produtos.status', 'admin.compras.aprovados', 'admin.produtos', 'admin.estoques', 'admin.compras', 'admin.marketing', 'admin.cadastros', 'admin.concluidos', 'admin.produtos.arquivados') ? 'active' : '' }}">

                            @can('admin.produtos')
                                <li class="submenu-item {{ request()->routeIs('admin.produtos') ? 'active' : '' }}">
                                    <a href="{{ route('admin.produtos') }}">{{ __('Todos os cadastros') }}</a>
                                </li>
                            @endcan
                            @can('admin.produtos.arquivados')
                                <li
                                    class="submenu-item {{ request()->routeIs('admin.produtos.arquivados') ? 'active' : '' }}">
                                    <a href="{{ route('admin.produtos.arquivados') }}">{{ __('Arquivados') }}</a>
                                </li>
                            @endcan
                            @can('admin.compras')
                                <li class="submenu-item {{ request()->routeIs('admin.compras') ? 'active' : '' }}">
                                    <a href="{{ route('admin.compras') }}">{{ __('Setor de compras(Em processo)') }}</a>
                                </li>
                            @endcan
                            @can('admin.compras.aprovados')
                                <li class="submenu-item {{ request()->routeIs('admin.compras.aprovados') ? 'active' : '' }}">
                                    <a
                                        href="{{ route('admin.compras.aprovados') }}">{{ __('Setor de compras(Concluidos)') }}</a>
                                </li>
                            @endcan
                            @can('admin.marketing')
                                <li class="submenu-item {{ request()->routeIs('admin.marketing') ? 'active' : '' }}">
                                    <a href="{{ route('admin.marketing') }}">{{ __('Setor de marketing') }}</a>
                                </li>
                            @endcan
                            @can('admin.cadastros')
                                <li class="submenu-item {{ request()->routeIs('admin.cadastros') ? 'active' : '' }}">
                                    <a href="{{ route('admin.cadastros') }}">{{ __('Setor de cadastros') }}</a>
                                </li>
                            @endcan
                            @can('admin.estoques')
                                <li class="submenu-item {{ request()->routeIs('admin.estoques') ? 'active' : '' }}">
                                    <a href="{{ route('admin.estoques') }}">{{ __('CD') }}</a>
                                </li>
                            @endcan
                            @can('admin.concluidos')
                                <li class="submenu-item {{ request()->routeIs('admin.concluidos') ? 'active' : '' }}">
                                    <a href="{{ route('admin.concluidos') }}">{{ __('Cadastros concluídos') }}</a>
                                </li>
                            @endcan
                            @can('admin.produtos.descriptions')
                                <li
                                    class="submenu-item {{ request()->routeIs('admin.produtos.descriptions') ? 'active' : '' }}">
                                    <a href="{{ route('admin.produtos.descriptions') }}">{{ __('Alterar Descrição') }}</a>
                                </li>
                            @endcan
                            @can('admin.produtos.status')
                                <li class="submenu-item {{ request()->routeIs('admin.produtos.status') ? 'active' : '' }}">
                                    <a href="{{ route('admin.produtos.status') }}">{{ __('Atualizar Status') }}</a>
                                </li>
                            @endcan
                            @can('admin.produtos.imagens')
                                <li class="submenu-item {{ request()->routeIs('admin.produtos.imagens') ? 'active' : '' }}">
                                    <a href="{{ route('admin.produtos.imagens') }}">{{ __('Atualizar Imagens') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['admin.campanhas', 'admin.cartaz', 'admin.cartaz.bg', 'admin.midias.create',
                    'admin.cards.individual'])
                    <li
                        class="sidebar-item  {{ request()->routeIs('admin.campanhas', 'admin.cartaz', 'admin.cartaz.bg', 'admin.midias.create', 'admin.cards.individual') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>{{ __('Campanhas') }}</span>
                        </a>
                        <ul
                            class="submenu {{ request()->routeIs('admin.campanhas', 'admin.cartaz', 'admin.cartaz.bg', 'admin.familia-produtos', 'admin.midias.create', 'admin.cards.individual') ? 'active' : '' }}">

                            @can('admin.campanhas')
                                <li class="submenu-item {{ request()->routeIs('admin.campanhas') ? 'active' : '' }}">
                                    <a href="{{ route('admin.campanhas') }}">{{ __('Todas campanhas') }}</a>
                                </li>
                            @endcan
                            @can('admin.cards.individual')
                                <li class="submenu-item {{ request()->routeIs('admin.cards.individual') ? 'active' : '' }}">
                                    <a href="{{ route('admin.cards.individual') }}">{{ __('Stories individuais') }}</a>
                                </li>
                            @endcan

                            @can('admin.cartaz')
                                <li class="submenu-item {{ request()->routeIs('admin.cartaz') ? 'active' : '' }}">
                                    <a href="{{ route('admin.cartaz') }}">{{ __('Cartaz individual') }}</a>
                                </li>
                            @endcan
                            @can('admin.cartaz.bg')
                                <li class="submenu-item {{ request()->routeIs('admin.cartaz.bg') ? 'active' : '' }}">
                                    <a href="{{ route('admin.cartaz.bg') }}">{{ __('Config dos cartazes') }}</a>
                                </li>
                            @endcan

                            @can('admin.midias.create')
                                <li class="submenu-item {{ request()->routeIs('admin.midias.create') ? 'active' : '' }}">
                                    <a
                                        href="{{ route('admin.midias.create') }}">{{ __('Configurações da campanhas') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['admin.arquivos'])
                    <li
                        class="sidebar-item  {{ request()->routeIs('admin.arquivos', 'admin.fotos') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>{{ __('Arquivos') }}</span>
                        </a>
                        <ul class="submenu {{ request()->routeIs('admin.arquivos', 'admin.fotos') ? 'active' : '' }}">
                            @can('admin.arquivos')
                                <li
                                    class="submenu-item {{ request()->routeIs('admin.arquivos', 'admin.fotos') ? 'active' : '' }}">
                                    <a href="{{ route('admin.arquivos') }}">{{ __('Arquivos') }}</a>
                                </li>
                            @endcan
                            @can('admin.fotos')
                                <li class="submenu-item {{ request()->routeIs('admin.fotos') ? 'active' : '' }}">
                                    <a href="{{ route('admin.fotos') }}">{{ __('Fotos') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                <li class="sidebar-item  ">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
