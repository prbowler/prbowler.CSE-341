<?php
include 'connect-db-ol.php';
$username_submitted = htmlspecialchars($_POST["username"]);
$password_submitted = htmlspecialchars($_POST["password"]);

$statement = $db->query('SELECT username, password FROM shopper');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$valid = false;

foreach ($results as $row) {
    if ($row['username'] == $username_submitted && $row['password'] == $password_submitted) {
        $valid = true;
        $user = $row['id'];
        echo '<script>alert("User has been found '. $user . '")</script>';
    }
}

if ($valid == true) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION['user'] = $user;
    echo '<script>alert("User has been changed to ' . $user . '")</script>';
    include 'home.php';
} else {
    include 'login.php';
}

?>