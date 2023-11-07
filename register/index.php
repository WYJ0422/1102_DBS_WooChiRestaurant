<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../static/js/register.js"></script>
    <link rel="stylesheet" href="../static/css/app.css">
    <link rel="stylesheet" href="../static/css/register.css">

</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../home">
            <img src="../static/img/icon/logo.png" width="30" height="30" alt="Image">
            <label>WooChi</label>
        </a>
    </nav>

    <div class="container">
        <div>
            <h3>歡迎加入WooChi餐廳會員</h3>
        </div>
        <form>
            <div class="form-group">
                <h5>帳號密碼</h5>
                帳號 : <input type="text" class="form-control" placeholder="請輸入帳號" name="account">
                密碼 : <input type="password" class="form-control" placeholder="請輸入密碼" name="password">
            </div>
            <div class="form-group">
                <h5>基本資料</h5>
                姓名 : <input type="text" class="form-control" placeholder="請輸入姓名" name="name">
                聯絡電話 : <input type="text" class="form-control" placeholder="請輸入聯絡電話" name="tel">
                聯絡信箱 : <input type="text" class="form-control" placeholder="請輸入聯絡信箱" name="mail">
            </div>
            <button type="button" id="submit" class="btn btn-primary btn-sm">加入</button>
        </form>
        <div class="padding">
            已經是會員了嗎?
            <a href="../login">立即登入</a>
        </div>
    </div>
</body>
</html>