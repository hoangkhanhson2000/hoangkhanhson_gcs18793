<?php
// By this way, you only enter the connection information once.
include('config.php');
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