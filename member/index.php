<?php

require("../php/User.php");
if (!user::check()) {
    header("Location: ../");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../static/js/member.js"></script>
    <link rel="stylesheet" href="../static/css/member.css">
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

    <div class="cover" onclick="closeOrderDetail()"></div>
    <div class="row">
        <div class="col-2">
            <h3>會員專區</h3>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">會員資料</a>
                <a class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">訂單紀錄</a>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- 基本資料 -->
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="center">
                    <h4>會員資料</h4>
                </div>    
                    <div id="member">
                        <span name="account">帳號 : </span><br>
                        <span name="name">姓名 : </span><br>
                        <span  name="tel">連絡電話 : </span><br>
                        <span  name="mail">聯絡信箱 : </span><br>
                        <span>會員點數 : </span><br>
                    </div>
                    <div class="center">
                        <button type="button" class="btn btn-primary btn-sm" onclick="showMemberEditBox()">編輯</button>  
                    </div>
                    <!-- 當按下編輯按鈕 -->
                    <form id="editmember">
                        <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">帳號</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="account">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">姓名</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="name">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">連絡電話</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="tel">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">連絡信箱</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="mail">
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" onclick="closeMemberEditBox()">取消</button>
                            <button type="button" class="btn btn-primary btn-sm" id="saveNewMemberInfo" onclick="closeMemberEditBox();postNewMemberInfo()">儲存變更</button>
                        </div>
                    </form>
                    <!-- 訂單紀錄 -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="center">
                        <h4>訂單紀錄</h4>
                    </div>
                    <div class="container bgcolor-white">
                        <div class="row">
                            <div class="col-2 bgcolor-white"></div>
                            <div class="col-8 bgcolor-white">
                                <div class="table-center">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th scope="col">用餐日期及時間</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="orderlist"></tbody>
                                    </table>
                                </div>    
                            </div>
                            <div class="col-2 bgcolor-white"></div>
                        </div>
                    </div>
                        <!-- 當按下詳細資料 -->
                        <div class="card w-50 window">
                            <div class="card-body" id="orderDetail">
                                <p>
                                    <h5 class="card-title"></h5>
                                </p>
                                <p class="card-text">
                                    <span></span><br>
                                    <span></span><br>
                                    <span></span><br>
                                    <span></span><br>
                                    <span></span><br>
                                    <span></span><br>    
                                </p>
                                <!-- <a href="#" class="btn btn-primary btn-sm">編輯</a>
                                <button type="button" class="btn btn-primary btn-sm">刪除</button> -->
                                <p>
                                    <button type="button" class="btn btn-primary btn-sm" id="closedetail"onclick="closeOrderDetail()">關閉</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>