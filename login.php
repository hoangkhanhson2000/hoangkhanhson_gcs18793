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
		$password = $_POST["password"];
		$link = pg_connect("host=".DB_SERVER." dbname=". DB_NAME ." user=" . DB_USERNAME . " password=" .DB_PASSWORD. "")
		or die('Could not connect1: ' . pg_last_error());
		$query="SELECT *FROM account WHERE username = $username";
		$result = pg_query($query);
		if ($result) {
			$link_password =pg_result ($result, 0, "password");
			if ($link_password == $password) {
				$msg = "Login sucess";
				$_SESSION['username'] = $username;
				header('Location: index.php');
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