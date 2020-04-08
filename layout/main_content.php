<div class="row">
    <?php 
        if(isset($page)){
            $page = $_GET['page']; 
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
