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
	
	require_once("config.php");
	
	if (isset($_POST["btn_submit"])) {
		
		$username = $_POST["username"];
		$passwordd = $_POST["password"];
		
		if ($username == "" || $passwordd =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "SELECT * FROM Account WHERE username = '$username' and password = '$passwordd'";
			$query = pg_query($link,$sql);
			$num_rows = pg_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				$_SESSION['username'] = $username;
              
                header('Location: index.php');
			}
		}
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
