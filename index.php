<?php include 'config/config.php'; ?>
<?php include 'helper/index.php' ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MP HTML</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= asset('image/favicon.png') ?>">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="<?= asset('css/jquery.modal.min.css') ?>">
    <link rel="stylesheet" href="<?php echo $cfg['site']['assest_path']; ?>css/select2.css">
    <link rel="stylesheet" href="<?php echo $cfg['site']['assest_path']; ?>css/style.css">
    <script>
        const BASE_URL = '<?= asset('') ?>';
    </script>
</head>

<body>
    <!-- header-start -->
    <?php include 'layout/header.php'; ?>
    <!-- header-end -->

    <!-- container start -->
    <div class="wrapper-main-content">
        <div class="wrapper-sidebar default">
            <?php include 'layout/leftside_bar.php'; ?>
        </div>
        <div class="wrapper-content position-relative">
            <?php include 'layout/main_content.php'; ?>

            <?php if(isset($_GET['page']) && $_GET['page'] == 'calendar'){
                include("./layout/set_event.php");
            } ?>
        </div>
    </div>

    <!-- footer start -->
    <?php include 'layout/footer.php'; ?>
    <!-- footer end  -->
    <!-- container end -->
    <!-- JS here -->
    <script src="<?php echo $cfg['site']['assest_path']; ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo $cfg['site']['assest_path']; ?>js/main.js"></script>
    <script src="<?= asset('js/jquery.modal.min.js') ?>"></script>
    <script src="<?= asset('js/calendar.bundle.js') ?>"></script>
    <script src="<?= asset('js/select2.js') ?>"></script>
    
</body>
</html>