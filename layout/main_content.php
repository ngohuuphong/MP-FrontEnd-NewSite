<div class="row">
    <div>
        <?php
        
            // define the directory separator
            define('DS', DIRECTORY_SEPARATOR);
            // define the application path
            define('ROOT', dirname(dirname(__FILE__))); 

            $page = isset($_GET['page']) ? $_GET['page'] : 'index'; 
            
            $PATH_VIEW = ROOT . DS . 'pages' . DS . $page . '.php';
            $valid = file_exists( $PATH_VIEW );
            // if we cannot find any, then find library/core directory
            if(!$valid){

                $PATH_VIEW = ROOT . DS . 'pages' . DS . 'index' . '.php';
                $valid = file_exists($PATH_VIEW);

                if(!$valid){
                    return '';
                }
            }
            include $PATH_VIEW;
        ?>
    </div>
</div>
