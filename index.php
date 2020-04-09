<?php include 'config/config.php'; ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MP HTML</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $cfg['assest_path']['img']; ?>favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo $cfg['assest_path']['css']; ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $cfg['assest_path']['css']; ?>font-awesome.css">
    <link rel="stylesheet" href="<?php echo $cfg['assest_path']['css']; ?>slicknav.css">
    <link rel="stylesheet" href="<?php echo $cfg['assest_path']['css']; ?>style.css">
    <link rel="stylesheet" href="<?php echo $cfg['site']['assest_path']; ?>css/main.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <?php if(isset($_GET['page']) && $_GET['page'] == 'entryprise-student'): ?>
    <link rel="stylesheet" href="<?php echo $cfg['site']['assest_path']; ?>css/particle/entryprise-student.css"/>
    <?php endif; ?>
</head>

<body>
    <!-- header-start -->
    <?php include 'layout/header.php'; ?>
    <!-- header-end -->

    <div class="container">
        <!-- container start -->
        <div class="col-md-12 p-0">
            <div class="row">
                <div class="col-md-4">
                    <?php include 'layout/leftside_bar.php'; ?>
                </div>
                <div id="col-md-8">
                    <?php include 'layout/main_content.php'; ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- footer start -->
    <?php include 'layout/footer.php'; ?>
    <!-- footer end  -->
    <!-- container end -->
    <!-- JS here -->
    <script src="<?php echo $cfg['assest_path']['js']; ?>jquery-3.4.1.min.js"></script>
    <script src="<?php echo $cfg['assest_path']['js']; ?>bootstrap.min.js"></script>
    <script src="<?php echo $cfg['assest_path']['js']; ?>jquery.slicknav.min.js"></script>
    <script src="<?php echo $cfg['site']['assest_path']; ?>js/main.js"></script>
</body>

</html>