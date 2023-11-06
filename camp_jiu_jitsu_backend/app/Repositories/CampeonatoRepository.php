<?php

namespace App\Repositories;

use App\Util\DatasUtil;
use Illuminate\Support\Facades\DB;

class CampeonatoRepository
{
    public static function buscarCampeonatosDestacados()
    {
        return DB::table('campeonato')
            ->where('destacado', 1)
            ->where('status', 'Ativo')
            ->orderBy('data_realizacao')
            ->limit(8)
            ->get()
            ->map(function ($item) {
                $data = $item->data_realizacao;

                $arrayData = explode('-', $data);

                $mes = $arrayData[1];
                $dia = $arrayData[2];

                $item->mes = DatasUtil::retornarMes($mes);
                $item->dia = $dia;

                return $item;
            });
    }

    public static function buscarCampeonatosRecentes()
    {
        return DB::table('campeonato')
            ->where('destacado', 0)
            ->where('status', 'Ativo')
            ->orderBy('data_realizacao')
            ->limit(8)
            ->get()
            ->map(function ($item) {
                $data = $item->data_realizacao;

                $arrayData = explode('-', $data);

                $mes = $arrayData[1];
                $dia = $arrayData[2];

                $item->mes = DatasUtil::retornarMes($mes);
                $item->dia = $dia;

                return $item;
            });
    }

    public static function buscarTodosCampeonatos()
    {
        return DB::table('campeonato')
            ->where('status', 'Ativo')
            ->orderBy('data_realizacao')
            ->limit(8)
            ->get()
            ->map(function ($item) {
                $data = $item->data_realizacao;

                $arrayData = explode('-', $data);

                $mes = $arrayData[1];
                $dia = $arrayData[2];

                $item->mes = DatasUtil::retornarMes($mes);
                $item->dia = $dia;

                return $item;
            });
    }
}
