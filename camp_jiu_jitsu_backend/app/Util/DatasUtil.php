<?php

namespace App\Util;

class DatasUtil
{
    public static function retornarMes($mes)
    {
        $arrayMes = [
            '01' => 'JAN',
            '02' => 'FEV',
            '03' => 'MAR',
            '04' => 'ABR',
            '05' => 'MAI',
            '06' => 'JUN',
            '07' => 'JUL',
            '08' => 'AGO',
            '09' => 'SET',
            '10' => 'OUT',
            '11' => 'NOV',
            '12' => 'DEC',
        ];

        return $arrayMes[$mes];
    }
}
