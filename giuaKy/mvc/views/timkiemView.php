<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="row">
        <div class="content text-center col-sm-6" id="content">
            <div class="con" id="con">
                <h1>Nhập số lương mà bạn muốn tìm kiếm lớn hơn...</h1>
            </div>
            <!-- <div class="text-center" style="margin-top: 5%;margin-left: 5%;" > -->
            <button id="showinputTimKiem">  Tìm Kiếm  </button>
            <a href="./">|==> Quay Về <==</a>
            <a href="./admin"> |==> Truy Cập Trang Admin <==| </a>
            <!-- </div> -->
        </div>
        <div class="inputSV col-sm-6">   
            <div class="" id="inputTimKiem">
                <?php
                    // $data["model"]->showAllStudent();
                    $data["model"]->showFormInputTimKiem();
                ?>
            </div>       
        </div>
    </div>
    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/main.js"></script>
</body>

</html>