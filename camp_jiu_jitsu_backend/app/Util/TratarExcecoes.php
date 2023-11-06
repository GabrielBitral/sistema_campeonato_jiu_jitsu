<?php

namespace App\Util;

class TratarExcecoes
{
    public static function verificaCodigo(\Throwable $excecao)
    {
        $codigo = $excecao->getCode();

        $mensagem = 'Ocorreu um erro interno';

        switch ($codigo) {
            case 500:
                break;
            case 23000:
                break;
            case 400:
                $mensagem = $excecao->getMessage();
                break;
            case 401:
                $mensagem = $excecao->getMessage();
                break;
            default:
                break;
        }

        return $mensagem;
    }
}
