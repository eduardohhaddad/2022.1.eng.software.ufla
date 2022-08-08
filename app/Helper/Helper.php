<?php

namespace App\Helper;

use DateTime;
use InvalidArgumentException;
use Mobile_Detect;
use NFePHP\DA\NFe\Danfe;

class Helper
{

    /**
     * Converte uma string em um decimal valido
     * @param string $str Numero Ex: 3,50 -- 3.500,89
     * @return float numero
     */
    public static function ParaDecimal(?string $str): float
    {
        if (is_null($str))
            return 0;
        if (strstr($str, ',')) {
            $str = str_replace('.', '', $str); // replace dots (thousand seps) with blancs
            $str = str_replace(',', '.', $str); // replace ',' with '.'
        }

        if (preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
            return floatval($match[0]);
        } else {
            return floatval($str); // take some last chances with floatval
        }
    }

    /**
     * Converte uma string em uma data valida
     * @param string $str data Ex: 2020-01-01
     * @return datetime data
     */
    public static function ParaDate(?string $str)
    {
        if (is_null($str))
            return null;

        return date('Y-m-d', strtotime($str));
    }

    /**
     * Converte uma string em uma data hora valida
     * @param string $str data Ex: 2020-01-01 12:00:000
     * @return datetime data
     */
    public static function ParaDateTime(?string $str)
    {
        if (is_null($str))
            return null;

        return date('Y-m-d H:i:s', strtotime($str));
    }

    /**
     * Converte uma string em uma data hora valida
     * @param string $str data Ex: 2020-01-01 12:00:000
     * @return datetime data Brasil
     */
    public static function ParaDateTimeBr(?string $str)
    {
        if (is_null($str))
            return null;

        return date('d-m-Y H:i', strtotime($str));
    }

    /**
     * Converte uma string em uma hora valida
     * @param string $str time Ex:  12:00:000
     * @return datetime data
     */
    public static function ParaTIme(?string $str)
    {
        if (is_null($str))
            return null;

        return date('H:i:s', strtotime($str));
    }

    /**
     * Converte uma string em uma hora valida
     * @param float $float time Ex:  1234.000
     * @return number_format numero (1.234) onde o ponto separa milhar
     */
    public static function ParaInteiro(?float $float)
    {
        if (is_null($float))
            return number_format(0, 0, ',', '.');

        return number_format($float, 0, ',', '.');
    }

    /**
     * Converte uma string em uma hora valida
     * @param float $float time Ex:  1234.000
     * @return number_format numero (1.234) onde o ponto separa milhar
     */
    public static function ParaFloat(?float $float)
    {
        if (is_null($float))
            return number_format(0, 2, ',', '.');

        return number_format($float, 2, ',', '.');
    }

    /**
     * Converte uma string em uma hora valida
     * @param float $float time Ex:  1234.000
     * @return number_format numero (1.234,00) onde o ponto separa milhar
     */
    public static function ParaDinheiro(?float $float)
    {
        if (is_null($float))
            return number_format(0, 2, ',', '.');

        return number_format($float, 2, ',', '.');
    }
}
