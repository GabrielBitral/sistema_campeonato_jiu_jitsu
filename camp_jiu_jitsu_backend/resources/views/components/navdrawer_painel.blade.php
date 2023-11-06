<aside class="bg-custom text-light py-4" style="width: 250px;">
    <div class="menu">
        @if (Auth::user()->tipo === 2)
            <div class="item">
                <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4"
                    type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true"
                    aria-controls="menu-usuario">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>

                    Usuários
                </div>

                @if (Request::segment(1) == 'cadastrar' || Request::segment(1) == 'painel')
                    <div class="collapse show" id="menu-usuario">
                        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                            @if (Request::segment(1) == 'cadastrar')
                                <a href="cadastrar"
                                    class="submenu-link link-light text-decoration-none rounded p-2 active">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Cadastrar

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </small>
                                </a>
                            @else
                                <a href="cadastrar" class="submenu-link link-light text-decoration-none rounded p-2">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Cadastrar
                                    </small>
                                </a>
                            @endif

                            @if (Request::segment(1) == 'painel')
                                <a href="painel"
                                    class="submenu-link link-light text-decoration-none rounded p-2 active">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Listagem
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </small>
                                </a>
                            @else
                                <a href="painel" class="submenu-link link-light text-decoration-none rounded p-2">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Listagem
                                    </small>
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="collapse" id="menu-usuario">
                        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                            @if (Request::segment(1) == 'cadastrar')
                                <a href="cadastrar"
                                    class="submenu-link link-light text-decoration-none rounded p-2 active">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Cadastrar

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </small>
                                </a>
                            @else
                                <a href="cadastrar" class="submenu-link link-light text-decoration-none rounded p-2">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Cadastrar
                                    </small>
                                </a>
                            @endif

                            @if (Request::segment(1) == 'painel')
                                <a href="painel"
                                    class="submenu-link link-light text-decoration-none rounded p-2 active">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Listagem
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </small>
                                </a>
                            @else
                                <a href="painel" class="submenu-link link-light text-decoration-none rounded p-2">
                                    <small class="d-flex justify-content-between align-items-center">
                                        Listagem
                                    </small>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="item-camp">
            <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4"
                type="button" data-bs-toggle="collapse" data-bs-target="#menu-camp" aria-expanded="true"
                aria-controls="menu-camp">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-award-fill" viewBox="0 0 16 16">
                    <path
                        d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z" />
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                </svg>

                Campeonatos
            </div>

            @if (Request::segment(1) == 'cadastrar_campeonato' || Request::segment(1) == 'campeonatos_painel')
                <div class="collapse show" id="menu-camp">
                    <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                        @if (Request::segment(1) == 'cadastrar_campeonato' && Auth::user()->tipo === 2)
                            <a href="cadastrar_campeonato"
                                class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </small>
                            </a>
                        @elseif(Auth::user()->tipo === 2)
                            <a href="cadastrar_campeonato"
                                class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar
                                </small>
                            </a>
                        @endif

                        @if (Request::segment(1) == 'campeonatos_painel')
                            <a href="campeonatos_painel"
                                class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Listagem

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </small>
                            </a>
                        @else
                            <a href="campeonatos_painel"
                                class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Listagem
                                </small>
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <div class="collapse" id="menu-camp">
                    <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                        @if (Request::segment(1) == 'cadastrar_campeonato')
                            <a href="cadastrar_campeonato"
                                class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </small>
                            </a>
                        @else
                            <a href="cadastrar_campeonato"
                                class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar
                                </small>
                            </a>
                        @endif

                        @if (Request::segment(1) == 'campeonatos_painel')
                            <a href="campeonatos_painel"
                                class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </small>
                            </a>
                        @else
                            <a href="campeonatos_painel" class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Listagem
                                </small>
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('logout_painel') }}">
            @csrf
            <a href="logout_painel"
                class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 ms-1 icon-link icon-link-hover"
                style="--bs-icon-link-transform: translate3d(-.125rem, 0, 0);"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                </svg>
                Sair
            </a>
        </form>
    </div>
</aside>
