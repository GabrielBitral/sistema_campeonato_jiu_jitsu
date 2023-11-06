<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PadraoRepository
{
    public static function selectAll(string $tabela)
    {
        return DB::table($tabela)->get();
    }

    public static function selectAllFieldsById(string $tabela, int $id)
    {
        return DB::table($tabela)
            ->where('id', $id)
            ->first();
    }

    public static function selectAllFieldByColumn(string $tabela, string $coluna, $valor)
    {
        return DB::table($tabela)
            ->where($coluna, $valor)
            ->first();
    }

    public static function selectFieldsById(string $tabela, array $colunas, int $id)
    {
        return DB::table($tabela)
            ->select($colunas)
            ->where('id', $id)
            ->first();
    }

    public static function insertInto(string $tabela, array $colunas)
    {
        return DB::table($tabela)
            ->insert($colunas);
    }

    public static function insertIntoGetId(string $tabela, array $colunas)
    {
        return DB::table($tabela)
            ->insertGetId($colunas);
    }

    public static function update(string $tabela, array $colunas, int $id)
    {
        return DB::table($tabela)
            ->where('id', $id)
            ->update($colunas);
    }

    public static function deleteById(string $tabela, int $id)
    {
        return DB::table($tabela)
            ->delete($id);
    }

    public static function deleteBy(string $tabela, string $coluna, $valor)
    {
        return DB::table($tabela)
            ->where($coluna, $valor)
            ->delete();
    }
}
