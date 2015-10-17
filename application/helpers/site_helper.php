<?php

if (!function_exists('debug')) {

    /**
     * @return Retorna un string parecido al var_dump,
     * con mejor formato visual.
     */
    function debug() {
        $trace = debug_backtrace();
        $rootPath = dirname(dirname(__FILE__));
        $file = str_replace($rootPath, '', $trace[0]['file']);
        $line = $trace[0]['line'];
        $var = $trace[0]['args'][0];
        $lineInfo = sprintf('<div><strong>%s</strong> (line <strong>%s</strong>)</div>', $file, $line);
        $debugInfo = sprintf('<pre>%s</pre>', print_r($var, true));
        print_r($lineInfo . $debugInfo);
    }

    /**
     * @return Devuelve un string de la cantidad de memoria usada,
     * evalua la cantidad y depende a esto, lo devuelve en bytes,kilobytes o megabytes.
     */
    function echo_memory_usage() {
        $mem_usage = memory_get_usage(true);

        if ($mem_usage < 1024)
            echo $mem_usage . " bytes";
        elseif ($mem_usage < 1048576)
            echo round($mem_usage / 1024, 2) . " kilobytes";
        else
            echo round($mem_usage / 1048576, 2) . " megabytes";

        echo "<br/>";
    }

    /**
     * @param $path es el directorio donde ha sido invocado la funcion.
     * 
     * @param $js es un array, la funcion lo recorre e imprime
     * la ruta del archivo javascript que deberia estar creado,
     * ademas, ya imprime con el formato <script></script>.
     */
    function setJs($path, $js = array()) {
        $pos = strrpos($path, '\\');

        foreach ($js as $key => $value) {
            echo '<script src="' . base_url() . 'application/views' . str_replace('\\', '/', substr($path, $pos)) . '/js/' . $js[$key] . '.js"></script>';
        }
    }

    /**
     * @param $path es el directorio donde ha sido invocado la funcion.
     * 
     * @param $css es un array, la funcion lo recorre e imprime
     * la ruta del archivo de hoja de estilos que deberia estar creado,
     * ademas, ya imprime con el formato <link />.
     */
    function setCss($path, $css = array()) {
        $pos = strrpos($path, '\\');

        foreach ($css as $key => $value) {
            echo '<link rel="stylesheet" type="text/css" href="' . base_url() . 'application/views' . str_replace('\\', '/', substr($path, $pos)) . '/css/' . $css[$key] . '.css"/>';
        }
    }

    /**
     * @return true, si la url Existe
     */
    function url_exist($url) {
        $http = get_headers($url);
        return ($http[0] == 'HTTP/1.1 200 OK');
    }
    

}