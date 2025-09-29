{{-- <div class="d-flex flex-column sidebar pt-4">

<a href="{{ route('home') }}" class=""><i class="fa-solid fa-house me-3"></i></i>Home</a>

@can('admin')
    <a href="{{ route('colaborators.all') }}" class=""><i class="fas fa-users me-3"></i>Colaboradores</a>
    <a href="{{ route('colaborators.rh-users') }}" class=""><i class="fas fa-users-gear me-3"></i>RH</a>
    <a href="{{ route('departments') }}" class=""><i class="fas fa-industry me-3"></i>Departamentos</a>
@endcan

<form action="{{ route('logout') }}" method="post">
@csrf
<button type="submit" class="btn btn-primary px-4 py-2">
<i class="fas fa-sign-out-alt me-3"></i>Logout
</button>
</form>

</div> --}}

<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="p-4">
            {{-- <a href="../dashboard/index.html" class="b-brand flex items-center gap-3">
                <img src="{{ asset('assets/images/logo-white.svg') }}" class="img-fluid logo logo-lg" alt="logo" />
                <img src="{{ asset('assets/images/favicon.svg') }}" class="img-fluid logo logo-sm" alt="logo" />
            </a> --}}
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo_avigest.png') }}" alt="Avigest" width="70%">
            </a>
        </div>
        <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
            <ul class="pc-navbar">
                <li class="pc-item">
                    {{-- <a href="../dashboard/index.html" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a> --}}
                    <a href="{{ route('home') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Lançamentos</label>
                    <i data-feather="feather"></i>
                </li>

                <li class="pc-item">
                    <a href="{{ route('nucleos.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Núcleos</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('lotes.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Lotes</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('coletas.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Coletas</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('descartes.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Descartes</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('mortes.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Mortes</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Controle</label>
                    <i data-feather="feather"></i>
                </li>

                <li class="pc-item">
                    <a href="{{ route('vacinas.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Vacina</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('pesos.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Peso</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Financeiro</label>
                    <i data-feather="feather"></i>
                </li>

                <li class="pc-item">
                    <a href="{{ route('vendas.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Vendas</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('despesas.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Despesas</span>
                    </a>
                </li>

                {{-- <li class="pc-item pc-caption">
                    <label>Cadastro</label>
                    <i data-feather="feather"></i>
                </li>

                <li class="pc-item">
                    <a href="{{ route('fornecedores.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Fornecedores</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('funcionarios.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Funcionários</span>
                    </a>
                </li> --}}

                {{-- <li class="pc-item pc-caption">
                    <label>UI Components</label>
                    <i data-feather="feather"></i>
                </li> --}}
                {{-- <li class="pc-item pc-hasmenu">
                    <a href="../elements/bc_color.html" class="pc-link">
                        <span class="pc-micon"> <i data-feather="edit"></i></span>
                        <span class="pc-mtext">Color</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="../elements/bc_typography.html" class="pc-link">
                        <span class="pc-micon"> <i data-feather="type"></i></span>
                        <span class="pc-mtext">Typography</span>
                    </a>
                </li> --}}
                {{-- <li class="pc-item pc-hasmenu">
                    <a href="../elements/icon-feather.html" class="pc-link">
                        <span class="pc-micon"> <i data-feather="feather"></i></span>
                        <span class="pc-mtext">Icons</span>
                    </a>
                </li> --}}
                {{-- <li class="pc-item pc-caption">
                    <label>Pages</label>
                    <i data-feather="monitor"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="../pages/login-v1.html" class="pc-link" target="_blank">
                        <span class="pc-micon"> <i data-feather="lock"></i></span>
                        <span class="pc-mtext">Login</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="../pages/register-v1.html" class="pc-link" target="_blank">
                        <span class="pc-micon"> <i data-feather="user-plus"></i></span>
                        <span class="pc-mtext">Registro</span>
                    </a>
                </li> --}}
                <li class="pc-item pc-caption">
                    <label>Outros</label>
                    <i data-feather="sidebar"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"> <i data-feather="align-right"></i>
                        </span><span class="pc-mtext">Parâmetros</span><span class="pc-arrow"><i
                                class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        {{-- <li class="pc-item"><a class="pc-link" href="#!">Cadastro</a></li> --}}
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Preparação<span class="pc-arrow"><i
                                        class="ti ti-chevron-right"></i></span></a>
                            <ul class="pc-submenu">

                                <li class="pc-item"><a class="pc-link" href="{{ route('galpoes.index') }}">Galpões</a>
                                </li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.programa.vacinacao.index') }}">Programa
                                        de Vacinação</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.detalhe.programa.vacinacao.index') }}">Detalhe Programa
                                        de Vacinação</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.controle.peso.index') }}">Peso</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.mortalidade.index') }}">Mortalidade</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.programa.luz.index') }}">Programa
                                        de Luz</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.programa.luz.index') }}">Programa
                                        de Luz</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.consumo.racao.index') }}">Consumo
                                        de Ração</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.consumo.agua.index') }}">Consumo
                                        de Água</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.fases.ave.index') }}">Fases da Ave</a></li>

                                {{-- <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                                                class="ti ti-chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </li>

                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Cadastro<span class="pc-arrow"><i
                                        class="ti ti-chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('clientes.index') }}">Clientes</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('fornecedores.index') }}">Fornecedores</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('funcionarios.index') }}">Funcionários</a></li>
                                {{-- <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                                                class="ti ti-chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Planejamento<span class="pc-arrow"><i
                                        class="ti ti-chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('formas_pgto.index') }}">Formas de
                                        Pagamento</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('formatos.index') }}">Formatos</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.tipo.despesa.index') }}">Tipo de
                                        Despesa</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.natureza.despesa.index') }}">Natureza da Despesa</a>
                                </li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('param.categoria.despesa.index') }}">Categoria da Despesa</a>
                                </li>
                            </ul>
                        </li>

                        {{-- <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i
                                        class="ti ti-chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                                                class="ti ti-chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
                {{-- <li class="pc-item">
                    <a href="../other/sample-page.html" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="sidebar"></i>
                        </span>
                        <span class="pc-mtext">Sample page</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
