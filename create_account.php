<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
   <body>
      <h3 style="text-align: center;">CREATE ACCOUNT</h3>
      <?php
// By this way, you only enter the connection information once.
include('connect_db.php');
$db = getDB();

$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT); // Encrypt the password.
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = intval($_POST['age']);
$success = 0;

if ($db) {
    $query = 'CREATE TABLE IF NOT EXISTS account (username VARCHAR(50) PRIMARY KEY,
                                                  password TEXT NOT NULL,
                                                  firstname VARCHAR(50),
                                                  lastname VARCHAR(50),
                                                  age INTEGER NOT NULL);';
    pg_query($query);

    if( isset($username) && isset($password) && isset($age) ) {
        $query = "INSERT INTO account (username, password, firstname, lastname, age)
                  VALUES ('$username', '$password', '$firstname', '$lastname', $age);";
        pg_query($query);
        $success = 1;
    }
    pg_close($db);
}

echo json_encode(array('success' => $success));
?>
      <form id="frm-create">
         <table style="margin-left: auto; margin-right: auto;">
            <tr>
               <td>Username:</td>
               <td><input type="email" name="username" id="username" required></td>
            </tr>

            <tr>
               <td>Password:</td>
               <td><input type="password" name="password" id="password" required></td>
            </tr>

            <tr>
               <td>First Name:</td>
               <td><input type="text" name="firstname" id="firstname" required></td>
            </tr>

            <tr>
               <td>Last Name:</td>
               <td><input type="text" name="lastname" id="lastname" required></td>
            </tr>

            <tr>
               <td>Age:</td>
               <td><input type="number" name="age" id="age" required></td>
            </tr>

            <tr style="text-align: center;">
               <td colspan="2">
                  <br>
                  <input type="submit" value="Create Account">
               </td>
            </tr>
         </table>
      </form>

      <p style="text-align: center;"><a href="login.php" rel="external">&larr; Back to Login page</a></p>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="js/index.js"></script>
   </body>
</html>
