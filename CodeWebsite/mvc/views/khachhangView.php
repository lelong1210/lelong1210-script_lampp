<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php require_once "block/head.php"; ?>
    <title>Chào Mừng Bạn Đến Với LQL</title>
</head>

<body>
    <!-- Header Area start  -->
    <header>
        <?php require_once "block/header.php"; ?>
        <?php require_once "block/headerMobile.php"; ?>
    </header>
    <!-- Header Area End  -->

    <!-- OffCanvas Cart Start -->
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <!-- OffCanvas Menu End -->


    <!-- breadcrumb-area start -->

    <?php 
        if($data["option"] == 0){
            require_once "page/khachhangPage.php"; 
        }
        if($data["option"] == 1){
            require_once "page/suadiachigiaohangPage.php"; 
        }
    ?>
    <!-- breadcrumb-area end -->

    <!-- login area start -->
    <!-- login area end -->
    <!-- Footer Area Start -->
    <div class="ds" id="conn"></div>
    <?php require_once "block/footer.php"; ?>
    <!-- Footer Area End -->

    <?php require_once "block/jslink.php"; ?>
</body>

</html>