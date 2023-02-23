@section('scrollbar-sidebar')
<div class="scrollbar-sidebar" id="scrollable" style="scroll-behavior: smooth;">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>

                <a href="{{ route('index') }}" class="mm-@if($page == 'Inicio')active @endif">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Inicio
                </a>
            </li>
            <li class="app-sidebar__heading">Protocolo de Correspondencia</li>
            <li class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[0] == 'Cautela')active @endif @endif">
                <a href="{{ route('controle.cautela.show') }}" class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[0] == 'Cautela')active @endif @endif" @if(str_contains($page,'-'))@if(explode('-', $page)[0]=='Cautela' )aria-expanded="true" @endif @endif>
                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Cautela
                </a>
               
            </li>
            
            <li class="app-sidebar__heading">Estoque</li>

            <li class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[0] == 'Estoque' && explode('-', $page)[1] == 'Categorias')active @endif @endif">
                <a href="{{ route('estoque.categorias.show') }}" class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[0] == 'Estoque' && explode('-', $page)[1] == 'Categorias')active @endif @endif" @if(str_contains($page,'-'))@if(explode('-', $page)[0]=='Categorias' )aria-expanded="true" @endif @endif>

                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Categorias

                </a>
            </li>
            <li class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[0] == 'Estoque' && explode('-', $page)[1] == 'Materiais')active @endif @endif">

                <a href="{{ route('estoque.materiais.show') }}" class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[0] == 'Materiais')active @endif @endif" @if(str_contains($page,'-'))@if(explode('-', $page)[0]=='Materiais' )aria-expanded="true" @endif @endif>

                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Materiais
                </a>

            </li>

            <li class="app-sidebar__heading">Modúlos</li>

            <li class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[1] == 'Todos')active @endif @endif">


                <a href="javascript:void(0)" class="mm-@if($page == 'Modulos-Todos')active @endif">
                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Visualizar todos</a>

            </li>
            <li class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[0] == 'Modulos' && explode('-', $page)[1] == 'Categorias')active @endif @endif">

                <a href="javascript:void(0)" class="mm-@if(str_contains($page,'-'))@if(explode('-', $page)[1] == 'Categorias')active @endif @endif" @if(str_contains($page,'-'))@if(explode('-', $page)[0]=='Categorias' )aria-expanded="true" @endif @endif>

                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Categorias
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('auth.module.authenticator') }}" class="mm-@if($page == 'Modulos-Categorias-Authenticators')active @endif">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Authenticators
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.security') }}" class="mm-@if($page == 'Modulos-Categorias-Security')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Security
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.motors') }}" class="mm-@if($page == 'Modulos-Categorias-Motors')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Motors
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.pkey') }}" class="mm-@if($page == 'Modulos-Categorias-Pkey')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Pkey
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.item') }}" class="mm-@if($page == 'Modulos-Categorias-Item')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Item
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.inventory') }}" class="mm-@if($page == 'Modulos-Categorias-Inventory')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Inventory
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.storage') }}" class="mm-@if($page == 'Modulos-Categorias-Storage')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Storage
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.profile') }}" class="mm-@if($page == 'Modulos-Categorias-Profile')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.module.printer') }}" class="mm-@if($page == 'Modulos-Categorias-Printer')active @endif">

                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Printer
                        </a>
                    </li>

                </ul>
            </li>
            <li class="app-sidebar__heading">Configurações</li>
            <li>
                <a href="{{ route('conf.usuario.show') }}" class="mm-@if($page == 'Usuario')active @endif">

                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Usuário
                </a>
            </li>
            <li>
                <a href="{{ route('conf.painel.show') }}" class="mm-@if($page == 'Painel')active @endif">

                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Painel
                </a>
            </li>
            <li>
                <a href="{{ route('conf.seguranca.show') }}" class="mm-@if($page == 'Segurança')active @endif">

                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Segurança
                </a>
            </li>
            <li>
                <a href="{{ route('conf.sistema.show') }}" class="mm-@if($page == 'Sistema')active @endif">

                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Sistema
                </a>
            </li>
        </ul>
    </div>
    <script>
        var i = 0
        var interval = setInterval(() => {
            ++i;
            $('#scrollable').scrollTo('.mm-active');
            if (i === 15) clearInterval(interval);
        }, 100);
    </script>
</div>
@endsection