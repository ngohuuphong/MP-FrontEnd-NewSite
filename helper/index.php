<?php 


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
function Route( $path = null ){
    global $cfg;
    return $cfg['site']['base_url'] . $path;
}

function isPageActive( $_page = null ){

    $page = isset($_GET['page']) ?  $_GET['page'] : 'top-page';
    if($page == $_page)
        return 'active';
    return null;
}