<?php

require("../php/User.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <script src="../static/js/home.js"></script>
    <!-- <script src="../static/js/base.js"></script> -->
    <link rel="stylesheet" href="../static/css/app.css">
    <link rel="stylesheet" href="../static/css/home.css">
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
                    <li class="nav-item" >
                        <a class="nav-link" href="../register">
                            <button class="btn btn-primary btn-sm" type="submit">加入會員</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login">
                            <button class="btn btn-primary btn-sm" type="submit">登入</button>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container no-bg">
        <!-- 餐廳簡介+LOGO照片 -->
        <p class="center">
            <div class="card mb-3">
                <img src="../static/img/woochi.jpg" class="card-img-top" alt="Image" height="100%">
                <div class="card-body">
                    <h4 class="card-title">WooChi Restaurant</h4>
                    <p class="card-text" id="description" contenteditable="true" white-space="pre"></p>
                    <?php if(User::check()): ?>
                        <?php if($_COOKIE["id"] == "1"): ?>
                            <span class="edit">
                                <button class="btn btn-primary btn-sm" type="button" onclick="editRestaurant()">儲存</button>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </p>
        <p class="center">
            <!-- 餐廳基本資訊 -->
            <div class="border">
                <h4>基本資料</h4>
                <div id="restaurant" >
                    <span name="name"></span> <br>
                    地址 : <span contenteditable="true" name="location"></span><br>
                    連絡電話 : <span contenteditable="true" name="tel"></span> <br>
                    聯絡信箱 : <span contenteditable="true" name="mail"></span> <br>
                    營業時間 : <span contenteditable="true" name="openinghour"></span> <br>
                    <?php if(User::check()): ?>
                        <?php if($_COOKIE["id"] == "1"): ?>
                            <span class="edit">
                                <button class="btn btn-primary btn-sm" type="button" onclick="editRestaurant()" >儲存</button>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>    
            </div>
        </p>
        <p class="center">
            <!-- 餐廳最新消息 -->
            <div class="border">
                <h4>最新消息</h4>
                <table class="table table-sm border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">內容</th>
                            <th scope="col">發布日期</th>
                        </tr>
                    </thead>
                    <tbody id="news"></tbody>
            </div>
        </p>
    </div>    
</body>
</html>