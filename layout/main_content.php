<div class="row">
    <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : null; 
        if(isset($page)){
            
            if($page == null) {
                $view = 'index'; 
            }else{
                $list_page = $cfg['site']['pages'];
                foreach($list_page as $itm){
                    if($itm == $page){
                        $view = $page;
                    }
                }
            }
        }else{
            $view = 'index'; 
        }
        include 'pages/' . $view . '.php';
    ?>
</div>
