<html>
	<head>
		<title>Register Page</title>
	</head>
	<body>
	<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$passwordd = $_POST["passwordd"];
		$namee = $_POST["namee"];
		$email = $_POST["email"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == "" || $name == "" || $email == "") {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
			$sql = "INSERT INTO users(
										username,
										passwordd,
										namee,
										email
									) VALUES (
										'$username',
										'$passwordd',
										'$namee',
										'$email'
									)";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			pg_query($link,$sql);
			echo "chúc mừng bạn đã đăng ký thành công";
		}
	}

?>
	<form action="register.php" method="POST">
<fieldset>
<legend>Register</legend>
		<table>

			<tr>
				<td colspan="2">Register Form</td>
			</tr>	
			<tr>
				<td>Username :</td>
				<td><input type="text" id="username" name="username" size="30"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass" size="30"></td>
			</tr>
			<tr>
				<td>Name :</td>
				<td><input type="text" id="name" name="name" size="30"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email" size="30"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Sign Up"></td>
			</tr>

		</table>
<p>Already have an account? <a href="login.php">Login here</a>.</p>
</fieldset>
  
	</form>
	</body>
	</html>