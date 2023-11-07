<form method="post" action="user_login.php">
	<input type='text' name='account' placeholder="請輸入帳號">
	<input type='password' name='password' placeholder="請輸入密碼">
	<input type="submit" value="登入">
</form>

<h4> "會員註冊" </h4>
<form method="post" action="user_signup.php">
	<input type='text' name='account' placeholder="請輸入帳號">
	<input type='password' name='password' placeholder="請輸入密碼">
	<input type='text' name='name' placeholder="請輸入名字">
	<input type='text' name='tel' placeholder="請輸入電話">
	<input type='text' name='mail' placeholder="請輸入郵件">
	<input type="submit" value="會員註冊">
</form>

<form name="店家資料" method="post" action="show_restaurant.php" >
<input type="submit" value="顯示店家資料">
</form>  

<form name="最新消息" method="post" action="show_news.php" >
<input type="submit" value="顯示最新消息">
</form>

<form name="評論" method="post" action="show_rate.php" >
<input type="submit" value="顯示評論">
</form>

<form name="寵物資訊" method="post" action="show_pets.php" >
<input type="submit" value="顯示寵物資訊">
</form>

<form name="menu" method="post" action="show_menu.php" >
<input type="submit" value="顯示菜單">
</form>

<form name="會員專區" method="post" action="show_customer.php" >
	<input type="submit" value="顯示會員資料(u_id=2)">
</form> 

<h4> "(u_id=2)新增評論" </h4>
<form name="評論" method="post" action="insert_rate.php" >
<input type='text' name='star' placeholder="星星數">
<input type='text' name='content' placeholder="內容">
<input type="submit" value="會員評論">
</form>

<h4> "回覆(r_id=1)評論" </h4> 
<form name="回覆評論" method="post" action="reply_rate.php" >
<input type='text' name='content' placeholder="回覆內容">
<input type="submit" value="回覆">
</form>

<h4> "(u_id=2)訂位" </h4>
<form name="訂位" method="post" action="insert_order.php" >
	<input type='text' name='time' placeholder="時間">	
	<input type='text' name='people' placeholder="訂位人數">
	<input type='text' name='seat' placeholder="區域">
	<input type='text' name='adopt' placeholder="領養意願">
	<input type='text' name='note' placeholder="備註">
	<input type="submit" value="訂位">
</form>
<form name="訂單" action="show_order.php" >
	<input type="submit" value="顯示(u_id=2)的訂單資料">
</form> 
<form name="訂單" action="show_order_detail.php" >
	<input type="submit" value="顯示詳細訂單資料(o_id=1)">
</form> 

<h4> "編輯(i_id=1)的menu" </h4>
<form name="" method="post" action="edit_menu.php" >
	<input type='text' name='content' placeholder="圖片檔">	
	<input type="submit" value="編輯">
</form>
<h4> "編輯店家資料" </h4>
<form name="" method="post" action="edit_restaurant.php" >
	<input type='text' name='name' placeholder="店家名字">	
	<input type='text' name='mail' placeholder="店家郵件">
	<input type='text' name='location' placeholder="店家地點">
	<input type='text' name='hour' placeholder="營業時間">
	<input type='text' name='desc' placeholder="店家描述">
	<input type="submit" value="編輯">
</form>
<h4> "編輯(n_id=1)的最新消息" </h4>
<form name="" method="post" action="edit_news.php" >
	<input type='text' name='content' placeholder="最新消息資訊">	
	<input type="submit" value="編輯">
</form>
<h4> "編輯(p_id=1)寵物資訊" </h4>
<form name="" method="post" action="edit_pets.php" >
	<input type='text' name='p_name' placeholder="名字">	
	<input type='text' name='photo' placeholder="照片">
	<input type='text' name='gender' placeholder="性別">
	<input type='text' name='age' placeholder="年齡">
	<input type='text' name='size' placeholder="size">
	<input type='text' name='v' placeholder="品種">
	<input type='text' name='desc' placeholder="描述">
	<input type='text' name='m' placeholder="是否植入晶片">
	<input type='text' name='l' placeholder="是否結紮">
	<input type='text' name='type' placeholder="狗/貓">
	<input type="submit" value="編輯">
</form>

<h4> "編輯(u_id=2)會員資料" </h4>
<form name="" method="post" action="edit_customer.php" >
	<input type='text' name='name' placeholder="名字">	
	<input type='text' name='phone' placeholder="電話">
	<input type='text' name='mail' placeholder="郵件">
	<input type="submit" value="編輯會員資料">
</form> 

<h4> "編輯(u_id=2)會員的(o_id=1)訂單" </h4>
<form name="" method="post" action="edit_orders.php" >
	<input type='text' name='time' placeholder="訂單時間">	
	<input type='text' name='num' placeholder="訂單人數">
	<input type='text' name='seat' placeholder="訂單座位">
	<input type='text' name='adopt' placeholder="領養意願">
	<input type='text' name='note' placeholder="備註">
	<input type="submit" value="編輯會員資料">
</form> 

<form name="" method="post" action="identify_role.php" >
	<input type="submit" value="user_id">
</form> 

<form name="" method="post" action="search_order.php" >
	<input type="text" name="content" placeholder="ID/name/date">
</form> 

<form name="" method="post" action="search_member.php" >
	<input type="text" name="content" placeholder="uid/name">
</form> 

<?php	
	$dbhost = '127.0.0.1';
	$dbuser = 'wu';
	$dbpass = '0422';
	$dbname = 'woochi';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
?>