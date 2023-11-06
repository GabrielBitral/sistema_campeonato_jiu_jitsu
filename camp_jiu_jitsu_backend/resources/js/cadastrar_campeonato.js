let canvas = $("#canvas"),
    context = canvas.get(0).getContext("2d");
let $modal = $('#modal');
let image = document.getElementById('canvas');
let cropper;

$('#fileInput').on('change', function () {
    if (this.files && this.files[0]) {
        if (this.files[0].type.match(/^image\//)) {
            let reader = new FileReader();
            reader.onload = function (evt) {
                let img = new Image();
                img.onload = function () {
                    context.canvas.height = img.height;
                    context.canvas.width = img.width;
                    context.drawImage(img, 0, 0);
                };
                img.src = evt.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    }
});

$("body").on("change", "#fileInput", function (e) {
    let files = e.target.files;
    let done = function (url) {
        image.src = url;
        $modal.modal('show');
    };
    let reader;
    let file;
    let url;

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
        aspectRatio: 16 / 9,
        viewMode: 3,
        preview: '.preview',
        responsive: true,
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});

$('#close').on('click', function () {
    $modal.modal('hide');
})
$('#fechar').on('click', function () {
    $modal.modal('hide');
})

$("#crop").click(function () {
    let canvasresultado = $("#resultado"),
        contextresultado = canvasresultado.get(0).getContext("2d");

    const dados = cropper.getData();

    let cropX = dados.x;
    let cropY = dados.y;
    let cropWidth = dados.width;
    let cropHeight = dados.height;

    let canvatelacadastro = document.getElementById('resultado');
    canvatelacadastro.width = cropWidth;
    canvatelacadastro.height = cropHeight;

    contextresultado.drawImage(
        document.getElementById('canvas'), cropX, cropY, cropWidth, cropHeight, 0, 0,
        cropWidth, cropHeight
    );

    cropper.getCroppedCanvas().toBlob(function (blob) {
        const url = URL.createObjectURL(blob);
        let reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function () {
            let base64data = reader.result;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                dataType: "json",
                url: "cadastrar_imagem",
                data: {
                    '_token': $('meta[name="_token"]').attr('content'),
                    'image': base64data
                },
                success: function (data) {
                    $modal.modal('hide');
                    const inputNomeImagem = document.querySelector(
                        '#nome_imgcortada');
                    inputNomeImagem.value = data.nome_imagem;
                }
            });
        }
    });

});

ClassicEditor
    .create(document.querySelector('#editor_sobre'))
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#editor_ginasio'))
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#editor_infos'))
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#editor_entrada'))
    .catch(error => {
        console.error(error);
    });

function mostrarSnack(texto) {
    let x = document.getElementById("snackbar");

    x.innerHTML = `<p>${texto}</p>`;

    x.className = "show";

    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 5000);
};

$("#formulario").submit(function (e) {
    const contentSobre = $('#editor_sobre').val();
    const htmlSobre = $(contentSobre).text();

    const contentGinasio = $('#editor_ginasio').val();
    const htmlGinasio = $(contentGinasio).text();

    const contentInformacoes = $('#editor_infos').val();
    const htmlInformacoes = $(contentInformacoes).text();

    if ($.trim(htmlSobre) == '') {
        mostrarSnack("Coloque as informações sobre o evento!");
        e.preventDefault();
    } else if ($.trim(htmlGinasio) == '') {
        mostrarSnack("Coloque as informações do ginásio!");
        e.preventDefault();
    } else if ($.trim(htmlInformacoes) == '') {
        mostrarSnack("Coloque as informações gerais do campeonato!");
        e.preventDefault();
    }
});