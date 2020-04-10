<div class="row">
    <div>
        <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : null; 
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
            include 'pages/' . $view . '.php';
        ?>
    </div>
</div>
