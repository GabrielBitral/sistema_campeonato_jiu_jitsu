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
    {{-- <link href="build/assets/cadastrar_campeonato-fb17acdf.css" rel="stylesheet">
    <link href="build/assets/snackbar-fd438197.css" rel="stylesheet"> --}}

    <script src="vendor/ckeditor5/build/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
        integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"
        integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>

    @vite(['resources/css/style.css', 'resources/css/snackbar.css', 'resources/css/cadastrar_campeonato.css', 'resources/js/app.js', 'resources/js/cadastrar_campeonato.js'])
</head>

<body class="bg-dark h-100">
    <x-nav_painel />
    <div class="d-flex" style="min-height: calc(100vh - 76px - 72px);">
        <x-navdrawer_painel />
        <main class="col h-100 text-light p-4">
            @if (session('mensagemSucesso'))
                <div class="alert alert-success">
                    {{ session('mensagemSucesso') }}
                </div>
            @endif

            @if (session('erro'))
                <div class="alert alert-danger">
                    {{ session('erro') }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>
</body>

</html>
