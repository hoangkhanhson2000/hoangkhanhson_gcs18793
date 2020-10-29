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
		$password = $_POST["passwordd"];
	   $db =getDB();
	   $msg = '';
		if ($db) {
			$query = "SELECT * FROM Account WHERE username = $username";
			$result = pg_query($query);
			if ($result) {
				$db_password =pg_result ($result, 0, "password");
			if ($db_passwordd ==$passwordd) {
					$msg = "Login sucess";
			}
			else{
				$msg ="no name in our database";
				}
				pg_close($db);
				}
 		}
		
	
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
				 <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
	    	</table>
  </fieldset>
  </form>
</body>
</html>