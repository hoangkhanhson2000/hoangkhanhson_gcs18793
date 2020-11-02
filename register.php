<?php
// By this way, you only enter the connection information once.
include('config.php');
$db = getDB();

$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT); // Encrypt the password.
$name = $_POST['name'];
$age = intval($_POST['age']);
$success = 0;

if ($db) {
    $query = 'CREATE TABLE IF NOT EXISTS account (username VARCHAR(50) PRIMARY KEY,
                                                  password TEXT NOT NULL,
                                                  name VARCHAR(50),
                                                  age INTEGER NOT NULL)';
    pg_query($query);

    if( isset($username) && isset($password) && isset($age) ) {
        $query = "INSERT INTO account (username, password, firstname, lastname, age)
                  VALUES  ('".$username."', '".$password."', '".$name."', '".$age."')";
        pg_query($query);
        $success = 1;
    }
    pg_close($db);
}

echo json_encode(array('success' => $success));
echo "successful signup"
?>