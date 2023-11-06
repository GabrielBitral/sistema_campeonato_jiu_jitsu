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
            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Editar Usuário</h1>

                <a href="painel" class="btn btn-light">Voltar</a>
            </div>

            <form action="" class="bg-custom rounded col-12 py-3 px-4">
                @csrf
                <div class="mb-3 row">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuário:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="usuario"
                            placeholder="Ex: Admin" value="Admin">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control bg-dark text-light border-dark" id="email"
                            placeholder="Ex: admin@kbrtec.com.br" value="admin@kbrtec.com.br">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control bg-dark text-light border-dark" id="senha">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Salvar</button>
                </div>
            </form>

            <div class="bg-custom rounded overflow-hidden">

            </div>
        </main>
    </div>

    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
