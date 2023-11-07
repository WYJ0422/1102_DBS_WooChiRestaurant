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
    <title>Order</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- date picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>

    <!-- jquery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <!-- <script src="/DBS_WooChi_Restaurant/static/js/home.js"></script> -->
    <script src="../static/js/base.js"></script>
    <script src="../static/js/order.js"></script>
    <link rel="stylesheet" href="../static/css/order.css">
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

    <div class="container">
        <div>
            <h4>聯絡資料</h4>
            <div id="member">
                <small class="text-muted" name="name">姓名 : </small><br>
                <small class="text-muted" name="tel">連絡電話 : </small><br>
                <small class="text-muted" name="mail">聯絡信箱 : </small><br>
                <small class="text-muted"> * 若要更改，請至「會員」 -> 「會員資料」 修改 </small>
            </div>
        </div>
        <form>
            <div class="center">
                <h4>訂位資訊</h4>
                <form>
                    <div class="form-group col-md-3">
                        <label for="start_date">日期</label>
                        <input type="text" class="form-control datepicker " id="start_date" name="meal_date"
                            placeholder=" YYYY-MM-DD">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">時間</label>
                        <select id="inputState" class="form-control" name="time">
                            <option selected>請選擇時間...</option>
                            <option value="10:00:00">10:00</option>
                            <option value="11:00:00">11:00</option>
                            <option value="12:00:00">12:00</option>
                            <option value="13:00:00">13:00</option>
                            <option value="14:00:00">14:00</option>
                            <option value="15:00:00">15:00</option>
                            <option value="16:00:00">16:00</option>
                            <option value="17:00:00">17:00</option>
                            <option value="18:00:00">18:00</option>
                        </select>
                    </div>
                </form>
                <div class="form-group col-md-3">
                    <label for="">用餐人數</label>
                    <input class="form-control" type="text" placeholder="請輸入用餐人數" name="people">
                </div>
                <!-- <div class="form-group col-md-3">
                    <label for="">選擇區域</label>
                    <span>(還沒處理)</span>
                    <button class="btn btn-primary btn-sm" type="submit">選擇</button>
                </div> -->
                <div class="form-group col-md-3">
                    <label for="">領養意願 : </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="Y">
                        <label class="form-check-label" for="inlineRadio1"> Y </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="N">
                        <label class="form-check-label" for="inlineRadio2"> N </label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="">備註 : </label>
                    <textarea class="text" placeholder="如果有其他特殊需求，請留言告訴我們!" name="note" id="textarea"></textarea>
                </div>
            </div>
            <button class="btn btn-primary btn-sm" type="button" id="subject" onclick="order()">送出</button>
        </form>
    </div>
</body>

</html>