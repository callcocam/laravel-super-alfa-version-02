<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

if (!function_exists('is_active')){

    function is_active($route){
        return request()->routeIs($route) ? ' bg-gray-700 bg-opacity-25 text-gray-100 ':' text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 ';
    }
}


if ( ! function_exists('status'))
{
    /**
     * Get the configuration path.
     *
     * @param $key
     * @return string
     */
    function status($key)
    {
        return ['draft','published'][$key];
    }
}



if ( ! function_exists('form_w'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function form_w($post) {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $post); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }
}

if ( ! function_exists('form_read'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function form_read($post) {
        if(is_numeric($post)):
            return @number_format($post,2, ",", "."  );
        endif;
        return $post;
    }
}


if(!function_exists('date_carbom_format')){

    function date_carbom_format($date, $format="d/m/Y H:i:s"){

        $date = explode(" ", str_replace(["-","/",":","T"]," ",$date));

        if(!isset($date[0])){
            $date[0]= null;
        }
        if(!isset($date[1])){
            $date[1]= null;
        }
        if(!isset($date[2])){
            $date[2]= null;
        }
        if(!isset($date[3])){
            $date[3]= null;
        }
        if(!isset($date[4])){
            $date[4]= null;
        }
        if(!isset($date[5])){
            $date[5]= null;
        }
        list($y,$m,$d,$h,$i,$s) = $date;

        //$carbon = \Carbon\Carbon::now();
        $carbon = \Illuminate\Support\Facades\Date::now();
        $carbon->locale('pt');
        if(strlen($date[0]) == 4){
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toDateTimeLocalString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toDayDateTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toLongDateString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toFullDateString().PHP_EOL;
//
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toShortTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toMediumTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toLongTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toFullTimeString().PHP_EOL;
//
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toShortDatetimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toMediumDatetimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toLongDatetimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toFullDatetimeString().PHP_EOL;
            return $carbon->create($y,$m,$d,$h,$i,$s);

        }
        if($y && $m && $d ){
            return $carbon->create($d,$m,$y,$h,$i,$s);
        }
        return $carbon->create(null,null,null,null,null,null);

    }
}

if ( ! function_exists('Calcular'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function Calcular($v1,$v2,$op) {
        $v1 = str_replace ( ".", "", $v1);
        $v1 = str_replace ( ",", ".", $v1);
        $v2 = str_replace ( ".", "",$v2 );
        $v2 = str_replace ( ",", ".",$v2);
        switch ($op) {
            case "+":
                $r = $v1 + $v2;
                break;
            case "-":
                $r = $v1 - $v2;
                break;
            case "*":
                $r = $v1 * $v2;
                break;
            case "%":
                $bs = $v1 / 100;
                $j = $v2 * $bs;
                $r = $v1 + $j;
                break;
            case "/":
                @$r = 0;
                if($v1>0 && $v2>0){
                    @$r = @$v1 / $v2;
                }
                break;
            case "tj":
                $bs = $v1 / 100;
                $j = $v2 * $bs;
                $r = $j;
                break;
            default :
                $r = $v1;
                break;
        }
        $ret = @number_format ( $r, 2, ",", "." );
        return $ret;
    }
}


if ( ! function_exists('Calcula'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function Calcula($v1,$v2,$op) {
        $v1 = str_replace ( ".", "", $v1);
        $v1 = str_replace ( ",", ".", $v1);
        $v2 = str_replace ( ".", "",$v2 );
        $v2 = str_replace ( ",", ".",$v2);
        switch ($op) {
            case "+":
                $r = $v1 + $v2;
                break;
            case "-":
                $r = $v1 - $v2;
                break;
            case "*":
                $r = $v1 * $v2;
                break;
            case "%":
                $bs = $v1 / 100;
                $j = $v2 * $bs;
                $r = $v1 + $j;
                break;
            case "/":
                @$r = 0;
                if($v1>0 && $v2>0){
                    @$r = @$v1 / $v2;
                }
                break;
            case "tj":
                $bs = $v1 / 100;
                $j = $v2 * $bs;
                $r = $j;
                break;
            default :
                $r = $v1;
                break;
        }
        $ret = @number_format ( $r, 3, ",", "." );
        return $ret;
    }
}
