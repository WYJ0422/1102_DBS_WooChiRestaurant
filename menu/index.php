<?php

require("../php/User.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../static/js/menu.js"></script>
    <link rel="stylesheet" href="../static/css/menu.css">
    <link rel="stylesheet" href="../static/css/app.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../home">
            <img src="../static/img/icon/logo.png" width="30" height="30" alt="Image">
            <label>WooChi</label>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../home">首頁 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../menu">守則&菜單</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pets">店內寵物</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../rate">關於評價</a>
                </li>
                <!-- if已登入 -->
                <?php if(!empty($_COOKIE) && !empty($_COOKIE["id"])): ?>
                    <?php if(User::check()): ?>
                        <!-- if是會員 -->
                        <?php if($_COOKIE["id"] !== "1"): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../order">我要訂位</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                    會員
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="../member">資料&訂單</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="../php/user_logout.php" class="btn btn-primary btn-sm" type="submit">登出</a>
                                </div>
                            </li>
                        <!-- if是商家 -->
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                    後台管理
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="../search">會員&訂單</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="../php/user_logout.php" class="btn btn-primary btn-sm" type="submit">登出</a>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- if未登入 -->
                    <li class="nav-item">
                        <a class="nav-link" href="../register">
                            <button class="btn btn-primary btn-sm" type="submit" >加入會員</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login">
                            <button class="btn btn-primary btn-sm" type="submit" >登入</button>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="center padding">
        <h4>
            <img src="../static/img/icon/menu.png" alt="img" width="40px">
            守則 & 菜單
            <img src="../static/img/icon/menu.png" alt="img" width="40px">
        </h4>
    </div>
    <div class="container center">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
            </ol>
            <div class="carousel-inner" id="menu">
                <div class="carousel-item active"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
                <div class="carousel-item"></div>
            </div>

            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
</body>
</html>