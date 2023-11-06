<?php

namespace App\Services;

use App\Repositories\PadraoRepository;
use DateTime;
use Illuminate\Support\Facades\Http;
use UnexpectedValueException;

class CampeonatoService
{
    public static function buscarCampeonatos()
    {
        $dados = PadraoRepository::selectAll('campeonato');

        foreach ($dados as $dado) {
            $dataConverter = new DateTime($dado->data_realizacao);

            $dataConverter = $dataConverter->format('d/m/Y');
            $dado->data_realizacao = $dataConverter;
        }

        return $dados;
    }

    public static function cadastrarCampeonato($dados)
    {
        $idEstado = $dados['estado'];
        $consultaEstado = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/$idEstado");
        $dadosEstado = $consultaEstado->json();
        $nomeCidadeEstado = $dados['nome_cidade'] . '-' . $dadosEstado['sigla'];

        $caminhoImagem = 'upload/' . $dados['nome_imgcortada'];
        $dados['status'] = $dados['status'] === 'ativo' ? 'Ativo' : 'Inativo';
        $dados['tipo'] = $dados['tipo'] === 'kimono' ? 'Kimono' : 'No-Gi';

        if ($dados['fase'] === 'inscricoes_abertas') {
            $dados['fase'] = 'Inscrições Abertas';
        } elseif ($dados['fase'] === 'chaves_lutas') {
            $dados['fase'] = 'Chaves de Lutas';
        } else {
            $dados['fase'] = 'Resultados';
        }

        unset($dados['nome_imgcortada']);
        unset($dados['estado']);
        unset($dados['nome_cidade']);

        $dados['cidade_estado'] = $nomeCidadeEstado;
        $dados['imagem'] = $caminhoImagem;

        $verificaSeJaExiste = PadraoRepository::selectAllFieldByColumn('campeonato', 'titulo', $dados['titulo']);

        if (!is_null($verificaSeJaExiste)) {
            throw new UnexpectedValueException('O campeonato já está cadastrado.', 400);
        }

        return PadraoRepository::insertInto('campeonato', $dados);
    }

    public static function salvarImagem($imagem)
    {
        $folderPath = public_path('upload/');

        $image_parts = explode(";base64,", $imagem);
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);

        return $imageName;
    }

    public static function modificarDestaque($taDestacao, $id)
    {
        $valor = $taDestacao == '1' ? 0 : 1;

        return PadraoRepository::update('campeonato', ['destacado' => $valor], $id);
    }
}
