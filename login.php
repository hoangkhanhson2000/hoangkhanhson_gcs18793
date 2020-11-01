<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
   <body>
      <h3 style="text-align: center;">LOGIN</h3>
      <?php
// By this way, you only enter the connection information once.
include('connect_db.php');
$db = getDB();

$username = $_POST['username'];
$password = $_POST['password'];
$success = 0;

if ($db) {
   $query = "SELECT * FROM account WHERE username='$username'";
   $result = pg_query($query);

   if ($result) {
      $db_password = pg_result($result, 0, "password");

      // Decrypt the password and then compare.
      if(password_verify($password, $db_password)) {
         $success = 1;
      }
   }
   
   pg_close($db);
}

$data = array('success' => $success, 'username' => $username);

echo json_encode($data);
?>
      <form id="frm-login">
         <table style="margin-left: auto; margin-right: auto;">
            <tr>
               <td>Username:</td>
               <td><input type="email" name="username" id="username" required></td>
            </tr>

            <tr>
               <td>Password:</td>
               <td><input type="password" name="password" id="password" required></td>
            </tr>

            <tr style="text-align: center;">
               <td colspan="2">
                  <br>
                  <input type="submit" value="Login">
               </td>
            </tr>
         </table>
      </form>

      <p style="text-align: center;">Don't have an account? Click <a href="create_account.php" rel="external">here</a> to create an account.</p>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="js/index.js"></script>
   </body>
</html>
