<x-layout_cadastrar_campeonato>
    <div id="snackbar">
    </div>
    <div class="d-flex align-items-end justify-content-between mb-4">
        <h1 class="h3">Cadastrar Campeonato</h1>

        <a href="campeonatos_painel" class="btn btn-light">Voltar</a>
    </div>

    <form method="POST" id="formulario" action="{{ route('cadastrar_campeonato') }}"
        class="bg-custom rounded col-12 py-3 px-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="titulo" class="col-sm-2 col-form-label">Titulo do Campeonato* :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control bg-dark text-light border-dark" id="titulo" name="titulo"
                    placeholder="Ex: Torneio Estadual Infatil 2024" required>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-6">
                <div class="row">
                    <label for="estado" class="col-sm-4 col-form-label">Estado* :</label>
                    <div class="col-sm-8">
                        <select id="estado" name="estado" required
                            class="form-control bg-dark text-light border-dark" onchange="mudarCidades()">
                            <option selected value="none">Selecione um estado</option>
                            @foreach ($estados as $uf)
                                <option value="{{ $uf['id'] }}"> {{ $uf['nome'] }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <label for="cidade" class="col-sm-2 col-form-label">Cidade* :</label>
                    <div class="col-sm-10">
                        <select id="cidade" name="cidade" required
                            class="form-control bg-dark text-light border-dark" onchange="colocarNomeCidade()">
                            <option selected value="none">Selecione uma cidade</option>
                        </select>
                        <input type="hidden" name="nome_cidade" id="nome_cidade">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="data_realizacao" class="col-sm-2 col-form-label">Data Realização* :</label>
            <div class="col-sm-10">
                <input type="date" class="form-control bg-dark text-light border-dark" id="data_realizacao"
                    name="data_realizacao" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tipo" class="col-sm-2 col-form-label">Tipo* :</label>
            <div class="col-sm-10">
                <select id="tipo" name="tipo" class="form-control bg-dark text-light border-dark" required>
                    <option selected value="none">Escolha um tipo</option>
                    <option value="kimono">Kimono</option>
                    <option value="no_gi">No Gi</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="fase" class="col-sm-2 col-form-label">Fase* :</label>
            <div class="col-sm-10">
                <select id="fase" name="fase" class="form-control bg-dark text-light border-dark" required>
                    <option selected value="none">Escolha uma fase</option>
                    <option value="inscricoes_abertas">Inscrições Abertas</option>
                    <option value="chaves_lutas">Chaves de Lutas</option>
                    <option value="resultados">Resultados</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status* :</label>
            <div class="col-sm-10">
                <select id="status" name="status" class="form-control bg-dark text-light border-dark" required>
                    <option selected value="none">Escolha um status</option>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="sobre_evento" class="col-sm-2 col-form-label">Sobre o evento* :</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="editor_sobre" name="sobre"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="ginasio" class="col-sm-2 col-form-label">Ginásio* :</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="editor_ginasio" name="ginasio"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="informacoes" class="col-sm-2 col-form-label">Informações Gerais* :</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="editor_infos" name="informacoes"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="entrada" class="col-sm-2 col-form-label">Entrada ao público :</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="editor_entrada" name="entrada"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="imagem" class="col-sm-2 col-form-label">Imagem* :</label>

            <div class="col-sm-10">
                <input type="file" class="form-control bg-dark text-light border-dark" id="fileInput"
                    name="fileInput" accept="image/gif, image/png, image/jpeg" required>
                <input type="hidden" id="nome_imgcortada" name="nome_imgcortada">
            </div>
        </div>
        <div class="mt-3">
            <canvas id="resultado"></canvas>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Selecione a área desejada</h5>
                        <button type="button" class="close" id="fechar" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <canvas id="canvas" />
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close"
                            data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="crop">Enviar Imagem</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-light">Cadastrar</button>
        </div>
    </form>

    <div class="bg-custom rounded overflow-hidden">

    </div>

    <script>
        function mudarCidades() {
            var select = document.getElementById('estado');
            var id = parseInt(select.value);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                dataType: "json",
                url: "api/cidades",
                data: {
                    '_token': $('meta[name="_token"]').attr('content'),
                    'id': id
                },
                success: function(data) {
                    $("#cidade").empty();
                    $("#cidade").append($('<option>', {
                        selected: true,
                        value: 'none',
                        text: 'Selecione uma cidade',
                    }));
                    $.each(data, function(a, b) {
                        $('#cidade').append($('<option>', {
                            value: b['id'],
                            text: b['nome']
                        }));
                    });
                }
            });
        }

        function colocarNomeCidade() {
            var inputNomeCidade = document.getElementById('nome_cidade');
            inputNomeCidade.value = $('#cidade :selected').text();
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    {{-- <script src="build/assets/cadastrar_campeonato-b0b4b792.js"></script> --}}

</x-layout_cadastrar_campeonato>
