<?php
session_start();
?>
<html>
<head>
	<title>LOGIN PAGE</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	//Gọi file connection.php ở bài trước
	require_once("config.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		$msg='';
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		if ($link) {
			$query="SELECT *FROM Account WHERE username=$username";
			$result = pg_query($query);
		$query = pg_query($link,$sql);
		if ($result) {
			$link_password =pg_result ($result, 0, "password");
			if ($link_password ==$password) {
				$msg = "Login sucess";
				}
				}
				else{
				$msg ="no name in our database";
				}
				pg_close($link);
				}
				echo $msg;
	}
	pg_close($link);
?>
	<form method="POST" action="login.php">
	<fieldset>
	    <legend>Login</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input name="btn_submit" type="submit" value="Đăng nhập"></td>
	    		</tr>
				
	    	</table>
			<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
  </fieldset>
  </form>
</body>
</html>
