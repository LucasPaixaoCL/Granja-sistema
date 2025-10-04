<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="p-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo_avigest.png') }}" alt="Avigest" width="70%">
            </a>
        </div>
        <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
            <ul class="pc-navbar">
                <li class="pc-item">
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
                <li class="pc-item pc-caption">
                    <label>Outros</label>
                    <i data-feather="sidebar"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"> <i data-feather="align-right"></i>
                        </span><span class="pc-mtext">Parâmetros</span><span class="pc-arrow"><i
                                class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Preparação<span class="pc-arrow"><i
                                        class="ti ti-chevron-right"></i></span></a>
                            <ul class="pc-submenu">

                                <li class="pc-item"><a class="pc-link" href="{{ route('galpoes.index') }}">Galpões</a>
                                </li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.programa_vacinacao.index') }}">Programa de Vacinação</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.detalhe_programa_vacinacao.index') }}">Detalhe Programa
                                        de Vacinação</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.controle_peso.index') }}">Peso</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.mortalidade.index') }}">Mortalidade</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.programa_luz.index') }}">Programa
                                        de Luz</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.consumo_racao.index') }}">Consumo
                                        de Ração</a></li>
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.consumo_agua.index') }}">Consumo
                                        de Água</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.fases_ave.index') }}">Fases da Ave</a></li>
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
                                        href="{{ route('parametros.tipo_despesa.index') }}">Tipo de
                                        Despesa</a></li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.natureza_despesa.index') }}">Natureza da Despesa</a>
                                </li>

                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('parametros.categoria_despesa.index') }}">Categoria da Despesa</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-caption">
                    <label>RH</label>
                    <i data-feather="users"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"> <i data-feather="users"></i>
                        </span><span class="pc-mtext">Gerenciamento</span><span class="pc-arrow"><i
                                class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('rh.management') }}">Painel</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('rh-users.index') }}">Usuários</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-caption">
                    <label>Suporte</label>
                    <i data-feather="sidebar"></i>
                </li>
                <li class="pc-item">
                    <a href="{{-- route('suporte.index') --}}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Suporte</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
