<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KBRTEC ADMIN</title>

    <link rel="icon" type="image/x-icon" href="imgs/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="build/assets/style-76acc700.css" rel="stylesheet">

    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body class="bg-dark h-100">
    <x-nav_painel />

    <div class="d-flex" style="min-height: calc(100vh - 76px - 72px);">
        <x-navdrawer_painel />

        <main class="col h-100 text-light p-4">
            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Campeonatos</h1>

                @if (Auth::user()->tipo === 2)
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light" title="PDF">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                            </svg>
                        </a>

                        <a href="#" class="btn btn-light" title="Excel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                                <path
                                    d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                            </svg>
                        </a>

                        <a href="cadastrar_campeonato" class="btn btn-light">+ Cadastrar Campeonato</a>
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-end mb-3">
                <form action="" class="bg-custom rounded col-12 py-3 px-4">
                    @csrf
                    <div class="row align-items-end row-gap-4">
                        <div class="col-3 d-flex flex-wrap">
                            <label for="search" class="col-form-label">Buscar:</label>
                            <div class="col-12">
                                <input type="text" class="form-control bg-dark text-light border-dark" id="search"
                                    placeholder="Ex: Admin">
                            </div>
                        </div>

                        <div class="col-3 d-flex flex-wrap">
                            <label for="status" class="col-form-label">Status:</label>
                            <div class="col-12">
                                <select name="status" class="form-control bg-dark text-light border-dark form-select"
                                    id="status">
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="ativado">Ativado</option>
                                    <option value="desativado">Desativado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-5 row">
                            <div class="col-12 col-form-label">Data:</div>

                            <div class="col-6 d-flex gap-2">
                                <label for="de" class="col-form-label">De:</label>
                                <input type="text" class="form-control bg-dark text-light border-dark" id="de"
                                    placeholder="27/10/2023">
                            </div>

                            <div class="col-6 d-flex gap-2">
                                <label for="ate" class="col-form-label">Até:</label>
                                <input type="text" class="form-control bg-dark text-light border-dark" id="ate"
                                    placeholder="27/10/2023">
                            </div>
                        </div>

                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-light w-100">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="bg-custom rounded overflow-hidden">
                <table class="table mb-0 table-custom table-dark align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">Título</th>
                            <th scope="col" class="text-uppercase">Status</th>
                            <th scope="col" class="text-uppercase">Data Realização</th>
                            <th scope="col" class="text-uppercase">Cidade - Estado</th>
                            <th scope="col" class="text-uppercase">Tipo</th>
                            <th scope="col" class="text-uppercase">Fase</th>
                            <th scope="col" class="text-uppercase text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campeonatos as $camp)
                            <tr>
                                <td>{{ $camp->titulo }}</td>
                                <td>{{ $camp->status }}</td>
                                <td>{{ $camp->data_realizacao }}</td>
                                <td>{{ $camp->cidade_estado }}</td>
                                <td>{{ $camp->tipo }}</td>
                                <td>{{ $camp->fase }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button"
                                            class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" title="Detalhes"
                                            onclick="mostrarInfos({{ json_encode($camp) }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </button>

                                        @if (Auth::user()->tipo === 2)
                                            @if ($camp->destacado === 0)
                                                <form method="POST" action="{{ route('destacar') }}">
                                                    @csrf
                                                    <input type="hidden" name="destacado" value="0">
                                                    <input type="hidden" name="id" value="{{ $camp->id }}">
                                                    <a href="destacar"
                                                        class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2"
                                                        title="Destacar"
                                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                                                        </svg>
                                                    </a>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('destacar') }}">
                                                    @csrf
                                                    <input type="hidden" name="destacado" value="1">
                                                    <input type="hidden" name="id"
                                                        value="{{ $camp->id }}">
                                                    <a href="destacar"
                                                        class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2"
                                                        title="Tirar Destaque"
                                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-bookmark-x-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z" />
                                                        </svg>
                                                    </a>
                                                </form>
                                            @endif

                                            <a href="editar"
                                                class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2"
                                                title="Editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    fill="currentColor" class="bi bi-pencil-fill"
                                                    viewBox="0 0 16 16">
                                                    <path fill="#141618"
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                            </a>

                                            <a href="#"
                                                class="btn btn-danger d-flex justify-content-center align-items-center rounded-circle p-2 mx-2"
                                                title="Deletar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path fill="#FFF"
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                    <path fill="#FFF"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="navigation">
                <ul class="pagination justify-content-end pt-4 pb-2">
                    <li class="page-item"><a class="page-link bg-custom border-dark link-light"
                            href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link bg-custom border-dark link-light" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link bg-custom border-dark link-light" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link bg-custom border-dark link-light" href="#">3</a>
                    </li>
                    <li class="page-item"><a class="page-link bg-custom border-dark link-light"
                            href="#">Próximo</a></li>
                </ul>
            </nav>
        </main>
    </div>

    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-light">
            <div class="modal-content bg-custom">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 titulo" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap row-gap-4">
                    <div class="col-12">
                        <div><small>Sobre:</small></div>
                        <div id="sobre"></div>
                    </div>

                    <div class="col-12">
                        <div><small>Ginásio:</small></div>
                        <div id="ginasio"></div>
                    </div>

                    <div class="col-12">
                        <div><small>Informações:</small></div>
                        <div id="informacoes"></div>
                    </div>
                    <div class="col-12">
                        <div><small>Entrada:</small></div>
                        <div id="entrada"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mostrarInfos(dados) {
            let tituloCamp = document.querySelector(".titulo");
            tituloCamp.innerHTML = dados.titulo;

            let divSobre = document.getElementById("sobre");
            const textoSobre = new DOMParser().parseFromString(dados.sobre, 'text/html');
            divSobre.innerHTML = textoSobre.body.textContent;

            let divGinasio = document.getElementById("ginasio");
            const textoGinasio = new DOMParser().parseFromString(dados.ginasio, 'text/html');
            divGinasio.innerHTML = textoGinasio.body.textContent;

            let divInfos = document.getElementById("informacoes");
            const textoInfos = new DOMParser().parseFromString(dados.informacoes, 'text/html');
            divInfos.innerHTML = textoInfos.body.textContent;

            let divEntrada = document.getElementById("entrada");
            const textoEntrada = new DOMParser().parseFromString(dados.entrada, 'text/html');
            divEntrada.innerHTML = textoEntrada.body.textContent;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>