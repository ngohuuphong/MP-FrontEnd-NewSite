<?php 

// define the directory separator
define('DS', DIRECTORY_SEPARATOR);
// define the application path
define('ROOT', dirname(dirname(__FILE__)));


function includeSVG($pathname){

    $PATH_SVG = ROOT . DS ."layout". DS . "svg" . DS . $pathname . '.php';
    // check root directory of library
    $valid = file_exists($PATH_SVG);
    
    // if we cannot find any, then find library/core directory
    if(!$valid){

        $PATH_SVG = ROOT . DS ."layout". DS . "svg" . $pathname;
        $valid = file_exists($PATH_SVG);

        if(!$valid){
            return '';
        }
    }
    
    
    
    $svg = file_get_contents( $PATH_SVG );
    return '<span class ="icon-svg">' . $svg . "</span>";
}
function asset( $path = null){
    global $cfg;
    return $cfg['site']['assest_path'] . $path;
}